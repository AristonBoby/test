<?php

namespace App\Http\Livewire\Laporan;

use Livewire\Component;

class Home extends Component
{

    public function index(){
       return view('LaporanPasien');
    }
}
