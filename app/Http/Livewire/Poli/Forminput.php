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
    protected $messages = ([
        'id_poli.required'      =>  'ID Poli Wajib Diisi',
        'id_poli.unique'        =>  'ID Poli Telah digunakan',
        'namapoli.required'     =>  'Nama Poli Wajib diisi',
    ]);

    //Method Penyimpan Poli//
    public function simpanpoli()
    {
        $this->validate();
        $simpan = poli::create(['id_poli'=>$this->id_poli, 'nama_poli' => $this->namapoli, 'status' => $this->status]);
        if($simpan)
        {
            $this->id_poli='';
            $this->namapoli='';
            $this->status=1;
            $this->dispatchBrowserEvent('simpanBerhasil');

        }
    }
    //end//
}
