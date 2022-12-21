<?php

namespace App\Http\Livewire\Laporan\Kunjungan;

use Livewire\Component;
use PDF;
use Dompdf\Dompdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class Cetakpdf extends Component
{
   public function cetakPdf($tanggalMulai, $tanggalSampai)
   {     $jumlahPoli = DB::table('kunjungans')
            ->join('polis','kunjungans.id_poli','polis.id_poli')
            ->selectRaw('count(kunjungans.id_poli) as jumlahPoli, polis.nama_poli')
            ->groupBy('kunjungans.id_poli')
            ->orderBy('jumlahPoli','desc')
            ->get();
         $jumlahjaminan = DB::table('kunjungans')
                  ->join('jaminans','kunjungans.id_jaminan','jaminans.id_jaminan')
                  ->selectRaw('count(jaminans.id_jaminan) as jumlahJaminan, jaminans.jaminan')
                  ->groupBy('jaminans.id_jaminan')
                  ->orderBy('jumlahJaminan','desc')
                  ->get();
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
              // ->select('tanggal','pasiens.no_Rm','pasiens.nama','pasiens.tanggal_Lahir','pasiens.jenkel','pasiens.nik','polis.nama_poli','jaminans.jaminan','pasiens.alamat')
               ->get();
      $dompdf = pdf::loadView('cetakPdf',['dataKunjungan'=> $query,'tglMulai'=>$tanggalMulai,'tglSampai'=>$tanggalSampai,'jumlahPoli'=>$jumlahPoli,'jaminan'=>$jumlahjaminan]);
      $dompdf->setPaper('A4','landscape');
     // $dompdf->save('myfile.pdf');
     // $dompdf->render();   
      return $dompdf->stream('Laporan_Kunjungan.pdf'); 
     // return $dompdf->download('Laporan_Kunjungan_'.$tanggalMulai.'/'.$tanggalSampai.'.pdf');
   }
}
