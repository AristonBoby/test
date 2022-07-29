<?php

namespace App\Http\Livewire\Diagnosa;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.diagnosa.index');
    }

    public function index ()
    {
        return view('diagnosa');
    }
}
