<?php

namespace App\Http\Livewire\Tambahuser;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire..tambahuser.index');
    }

    public function index(){
        return view('tambahuser');
    }
}
