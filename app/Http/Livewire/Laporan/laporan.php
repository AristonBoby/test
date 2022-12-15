<?php

namespace App\Http\Livewire\Laporan;

use Livewire\Component;

class laporan extends Component
{

    public function laporanPasienBaru(){
       return view('laporanPasienBaru');
    }

    public function laporanDomisili(){
        return view('laporanDomisili');
    }

    public function laporanKunjungan(){
        return view('laporanKunjungan');
    }
}
