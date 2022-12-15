<?php

namespace App\Http\Livewire\Laporan\Kunjungan;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Table extends Component
{   
    public $tanggalMulai;
    public $tanggalSelesai;
    public function render()
    {
        $data = DB::table('kunjungans')
                ->join('jaminans','kunjungans.id_jaminan','jaminans.id_jaminan')
                ->join('pasiens','kunjungans.id_pasien','pasiens.id')
                ->join('polis','kunjungans.id_poli','polis.id_poli')
                ->select('kunjungans.id','pasiens.no_Rm','pasiens.nama','pasiens.tanggal_Lahir','pasiens.jenkel','pasiens.nik','pasiens.bpjs','polis.nama_poli','jaminans.jaminan','tanggal','pasiens.no_tlpn')
                ->where('tanggal','2202/12/16')
                ->orderBy('polis.nama_poli','desc')
                ->paginate(10);
        return view('livewire.laporan.kunjungan.table'['
            
        ']);
    }
}
