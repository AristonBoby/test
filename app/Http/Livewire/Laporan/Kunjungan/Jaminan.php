<?php

namespace App\Http\Livewire\Laporan\Kunjungan;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
class Jaminan extends Component
{   public $listeners = ['laporanKunjungan'=>'cariLaporan','modalDataJaminan'];
    public $jumlah;
    public $tanggalMulai;
    public $tanggalSelesai;
    public function render()
    {
        return view('livewire.laporan.kunjungan.jaminan',[
            'jumlahJaminan' => $this->jumlah
        ]);
    }

    public function modalDataJaminan($data)
    {
        $this->cariLaporan($this->tanggalMulai,$this->tanggalSelesai);
        $this->emit('modalPasienJaminan',$data,$this->tanggalMulai,$this->tanggalSelesai);
    }

    public function cariLaporan($tanggalMulai,$tanggalSelesai)
    {   $this->tanggalMulai = $tanggalMulai;
        $this->tanggalSelesai = $tanggalSelesai;
        $jumlahJaminan = DB::table('kunjungans')
                    ->join('jaminans','kunjungans.id_jaminan','jaminans.id_jaminan')
                    ->selectRaw('count(kunjungans.id_jaminan) as jumlah,jaminans.id_jaminan, jaminans.jaminan')
                    ->groupBy('kunjungans.id_jaminan')
                    ->whereBetween('tanggal',[$tanggalMulai,$tanggalSelesai])
                    ->orderBy('jumlah','desc')->get();

        $totalJaminan = DB::table('kunjungans')
                    ->whereBetween('tanggal',[$this->tanggalMulai,$this->tanggalSelesai])
                    ->count();
        $this->totalJaminan = $totalJaminan;
        $this->jumlah = $jumlahJaminan;
    }
}
