<?php
namespace App\Http\Livewire\Pendaftaran\Pasien;

use Livewire\Component;

class Cetak extends Component
{
    public function cetak ($id)
    {
        return view('cetakPasien',['nama'=>$id]);
    }
}