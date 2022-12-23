<?php

namespace App\Http\Livewire\Laporan\Kunjungan;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Jenkel extends Component
{   protected $listeners = ['laporanKunjungan'=>'cariLaporan'];
    public $jenkel;
    public function render()
    {
        return view('livewire.laporan.kunjungan.jenkel',[
            'jenkel' => $this->jenkel
        ]);
    }

    public function cariLaporan($tanggalMulai,$tanggalSelesai)
    {
        $jumlahjenkel = DB::table('kunjungans')
            ->join('pasiens','kunjungans.id_pasien','pasiens.id')
            ->selectRaw('count(pasiens.jenkel) as jumlah ,pasiens.jenkel')
            ->groupBy('pasiens.jenkel')
            ->whereBetween('kunjungans.tanggal',[$tanggalMulai,$tanggalSelesai])
            ->orderBy('jumlah','desc')->get();
        $this->jenkel = $jumlahjenkel;
    }
    
}
