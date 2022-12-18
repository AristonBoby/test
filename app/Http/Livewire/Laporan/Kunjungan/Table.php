<?php

namespace App\Http\Livewire\Laporan\Kunjungan;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Table extends Component
{  
    public $tanggalMulai ;
    public $tanggalSelesai ;
    protected $LaporanPasien ;
    public $listeners = ['laporanKunjungan'=>'cariLaporan'];

    public function render()
    {
        

        return view('livewire.laporan.kunjungan.table',['varLaporanPasien' => $this->LaporanPasien]);
    }

    public function mount(){
        $this->tanggalSelesai = date('Y-m-d');
        $this->tanggalMulai = date('Y-m-d');
    }

    public function cariLaporan($tanggalMulai,$tanggalSelesai)
    {
        $pasien = DB::table('kunjungans')
            ->join('jaminans','kunjungans.id_jaminan','jaminans.id_jaminan')
            ->join('pasiens','kunjungans.id_pasien','pasiens.id')
            ->join('polis','kunjungans.id_poli','polis.id_poli')
            ->select('kunjungans.id','pasiens.no_Rm','pasiens.nama','pasiens.tanggal_Lahir','pasiens.alamat','pasiens.jenkel','pasiens.nik','pasiens.bpjs','polis.nama_poli','jaminans.jaminan','tanggal','pasiens.no_tlpn')
            ->whereBetween('tanggal',[$tanggalMulai,$tanggalSelesai])
            ->orderBy('polis.nama_poli','desc')
            ->paginate(10);
            $this->LaporanPasien = $pasien;
    }
}
