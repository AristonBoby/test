<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\kunjungan;
class Laporan extends Component
{   public $umum;
    public function render()
    {
        return view('livewire.Laporan.index');
        
    }

    public function index(){
       return view('livewire.Laporan.index');
    }
}
