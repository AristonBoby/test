<?php

namespace App\Http\Livewire\Poli;

use Livewire\Component;
use App\Models\poli;

class Forminput extends Component
{   public $id_poli;
    public $namapoli;
    public $status = 1 ;
    public function render()
    {
        return view('livewire.poli.forminput');
    }
    protected $rules = ([
        'id_poli'   => 'required|unique:polis',
        'namapoli'  => 'required|max:25',
        'status'    => 'required'
    ]);
    protected $message = ([

    ]);

    //Method Penyimpan Poli//
    public function simpanpoli()
    {
        $this->validate();
        $simpan = poli::create(['id_poli'=>$this->id_poli, 'nama_poli' => $this->namapoli, 'status' => $this->status]);
        if($simpan)
        {
            $this->dispatchBrowserEvent('simpanBerhasil');
        }
    }
    //end//
}
