<?php

namespace App\Http\Livewire\Pendaftaran\Kunjungan;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.pendaftaran.kunjungan.index');
    }
    
    public function index(){
        return view('kunjungan');
    }
    
    
}
