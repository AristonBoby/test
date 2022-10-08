<?php

namespace App\Http\Livewire\Jaminan;

use Livewire\Component;
use App\Models\jaminan;
use Livewire\WithPagination;

class TabelJaminan extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.jaminan.tabel-jaminan',[
            'jaminan'=> jaminan::paginate(5)
        ]);
    }
}
