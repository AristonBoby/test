<?php

namespace App\Http\Livewire\Laporan\Kunjungan;

use Livewire\Component;
use PDF;
use Dompdf\Dompdf;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class Cetakpdf extends Component
{
   public function cetakPdf($tanggalMulai, $tanggalSampai)
   {

        $tanggalMulai = \Carbon\Carbon::parse($tanggalMulai)->format('Y-m-d');
        $tanggalSampai = \Carbon\Carbon::parse($tanggalSampai)->format('Y-m-d');


      $query = DB::table('kunjungans')
            ->Join('pasiens','kunjungans.id_pasien','pasiens.id')
            ->join('kelurahans','pasiens.kel_id','kelurahans.id_kel')
            ->join('kecamatans','kelurahans.kec_id','kecamatans.id_kec')
            ->join('kotas','kecamatans.kota_id','kotas.kota_id')
            ->join('polis','kunjungans.id_poli','polis.id_poli')
            ->join('jaminans','kunjungans.id_jaminan','jaminans.id_jaminan')
            ->whereBetween('kunjungans.tanggal',[$tanggalMulai,$tanggalSampai])
            ->select('pasiens.jenkel','pasiens.nik','pasiens.tanggal_Lahir','pasiens.no_Rm','pasiens.nama','pasiens.alamat','jaminans.jaminan','polis.nama_poli','kelurahans.kel_name','kec_name','kota_name','tanggal')
            ->orderBy('tanggal','asc')
            ->get();
         if($query){
            $jumlahPoli = DB::table('kunjungans')
            ->join('polis','kunjungans.id_poli','polis.id_poli')
            ->selectRaw('count(kunjungans.id_poli) as jumlahPoli, polis.nama_poli')
            ->whereBetween('kunjungans.tanggal',[$tanggalMulai,$tanggalSampai])
            ->groupBy('kunjungans.id_poli')
            ->orderBy('jumlahPoli','desc')
            ->get();

         }
         if($jumlahPoli){
            $jumlahjaminan = DB::table('kunjungans')
                  ->join('jaminans','kunjungans.id_jaminan','jaminans.id_jaminan')
                  ->selectRaw('count(jaminans.id_jaminan) as jumlahJaminan, jaminans.jaminan')
                  ->whereBetween('kunjungans.tanggal',[$tanggalMulai,$tanggalSampai])
                  ->groupBy('jaminans.id_jaminan')
                  ->orderBy('jumlahJaminan','desc')
                  ->get();
         }
         if($jumlahjaminan){
            $jumlahjenkel = DB::table('kunjungans')
               ->join('pasiens','kunjungans.id_pasien','pasiens.id')
               ->selectRaw('count(pasiens.jenkel) as jumlah ,pasiens.jenkel')
               ->groupBy('pasiens.jenkel')
               ->whereBetween('kunjungans.tanggal',[$tanggalMulai,$tanggalSampai])
               ->orderBy('jumlah','desc')->get();
         }
         return view('livewire.laporan.kunjungan.cetakpdf',[
                    'jumlahjenkel'  =>  $jumlahjenkel,
                    'dataKunjungan' =>  $query,
                    'tglMulai'      =>  $tanggalMulai,
                    'tglSampai'     =>  $tanggalSampai,
                    'jumlahPoli'    =>  $jumlahPoli,
                    'jaminan'       =>  $jumlahjaminan,
                ]);

   }
}
