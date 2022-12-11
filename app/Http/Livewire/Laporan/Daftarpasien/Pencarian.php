<?php

namespace App\Http\Livewire\Laporan\Daftarpasien;

use Livewire\Component;

class Pencarian extends Component
{   
    public $tglmulai;
    public $tglsampai;
    public function render()
    {
        return view('livewire.laporan.daftarpasien.pencarian');
    }

    public function cari()
    {
        $this->emit('laporanPasien',$this->tglmulai, $this->tglsampai);
    }   
}
