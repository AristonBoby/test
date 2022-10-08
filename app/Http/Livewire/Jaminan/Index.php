<?php

namespace App\Http\Livewire\Jaminan;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.jaminan.index');
    }
    public function show()
    {
        return view('jaminan');
    }
}
