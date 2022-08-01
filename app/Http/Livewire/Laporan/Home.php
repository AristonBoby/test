<?php

namespace App\Http\Livewire\Laporan;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.home');
    }

    public function index(){
        return view('Laporan');
    }
}
