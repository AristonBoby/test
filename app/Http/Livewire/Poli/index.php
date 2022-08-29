<?php

namespace App\Http\Livewire\Poli;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.poli.forminput');
    }

    public function show()
    {
        return view('poli');
    }
}
