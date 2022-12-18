<?php

namespace App\Http\Livewire\Laporan\Kunjungan;

use Livewire\Component;

class Formtanggal extends Component
{
    public $tanggalMulai;
    public $tanggalSampai;
    public function render()
    {
        $tanggalMulai = $this->tanggalMulai;
        $tanggalSampai = $this->tanggalSampai;

        return view('livewire.laporan.kunjungan.formtanggal',[
            'tanggalMulai' =>$tanggalMulai,
            'tanggalSampai'=>$tanggalSampai,
        ]);
    }
    public function mount(){
        $this->tanggalMulai;
        $this->tanggalSampai;
    }

    public function store()
    {
        $this->emit('laporanKunjungan',$this->tanggalMulai, $this->tanggalSampai);
    }
    
}
