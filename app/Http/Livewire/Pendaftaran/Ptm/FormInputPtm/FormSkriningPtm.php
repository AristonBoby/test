<?php

namespace App\Http\Livewire\Pendaftaran\Ptm\FormInputPtm;

use Livewire\Component;

class FormSkriningPtm extends Component
{   protected $listeners = ['pencarian'];

    public function render()
    {
        return view('livewire.pendaftaran.ptm.form-input-ptm.form-skrining-ptm');
    }

    public function pencarian($id,$tanggal)
    {
        dd($tanggal);
    }
}
