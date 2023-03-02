<?php

namespace App\Http\Livewire\Pendaftaran\Ptm\FormInputPtm;

use Livewire\Component;

class FormInput extends Component
{   public $listeners = ['ubahTanggal'];
    public $varTanggal  = '';
    public $nik         = '';
    public function render()
    {
        return view('livewire.pendaftaran.ptm.form-input-ptm.form-input');
    }

    public function mount()
    {
        $this->varTanggal = date('d-m-Y');
    }

    public function ubahTanggal($id)
    {
        $this->varTanggal = $id;
    }

    public function pencarianPtm()
    {
        $this->emit('pencarian', $this->nik, $this->varTanggal);
    }
}
