<?php

namespace App\Http\Livewire\Laporan\Kunjungan;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
class Jaminan extends Component
{   public $listeners = ['laporanKunjungan'=>'cariLaporan'];
    protected $jumlah;
    public function render()
    {
        return view('livewire.laporan.kunjungan.jaminan',[
            'jumlahJaminan' => $this->jumlah
        ]);
    }

    public function cariLaporan($tanggalMulai,$tanggalSelesai)
    {
        $jumlahJaminan = DB::table('kunjungans')
                    ->join('jaminans','kunjungans.id_jaminan','jaminans.id_jaminan')
                    ->selectRaw('count(kunjungans.id_jaminan) as jumlah, jaminans.jaminan')
                    ->groupBy('kunjungans.id_jaminan')
                    ->whereBetween('tanggal',[$tanggalMulai,$tanggalSelesai])
                    ->orderBy('jumlah','desc')->get();
        $totalJaminan = DB::table('kunjungans')
                    ->whereBetween('tanggal',[$tanggalMulai,$tanggalSelesai])
                    ->count();
        $this->totalJaminan = $totalJaminan;
        $this->jumlah = $jumlahJaminan;
    }
}
