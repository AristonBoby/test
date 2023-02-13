<?php

namespace App\Http\Livewire\Pendaftaran\Ptm;

use Livewire\Component;
use App\Models\pasien;
class TableDaftar extends Component
{
    public function render()
    {
        return view('livewire.pendaftaran.ptm.table-daftar',[
            'ptm' => pasien::paginate(10),
        ]);
    }
}
