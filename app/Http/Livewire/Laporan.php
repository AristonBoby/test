<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Laporan extends Component
{   
    public function render()
    {
        return view('livewire.Laporan.index');  
    }

    public function index(){
       return view('livewire.Laporan.index');
    }
    

    public function laporanpoli(){
        //$query = DB::table('kunjungans')->get();
        dd('ddd');
    }
}