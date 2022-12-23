<?php

namespace App\Http\Livewire\Jaminan;

use Livewire\Component;
use App\Models\jaminan;
use Livewire\WithPagination;
class Table extends Component
{   public $id_jaminan;
    public $jaminan;
    public $status=0;
    public function render()
    {
        return view('livewire.jaminan.table');
    }
    protected $rules = [
        'id_jaminan'    =>  'required|unique:jaminans|max:2',
        'jaminan'       =>  'required|max:25',
        'status'        =>  'required|max:1'
    ];

    protected $messages = [
        'id_jaminan.required'    => 'Id jaminan wajib dIisi',
        'id_jaminan.max'         => 'Id Jaminan Mininmal 2 Karakter',
        'jaminan.jaminan'        => 'Jaminan Mininmal 25 Karakter',
        'id_jaminan.unique'      => 'Id jaminan telah digunakan',
        'jaminan.required'       => 'Jaminan wajib diisi',
        'status.required'        => 'Status wajib diisi'
    ];
    public function simpan(){
        $this->validate();
        $query = jaminan::create([
        'id_jaminan' => $this->id_jaminan,
        'jaminan'    => $this->jaminan,
        'status'     => $this->status,
       ]);
       if($query){
            $this->dispatchBrowserEvent('simpanjaminan');
       }
       else{
            $this->dispatchBrowserEvent('gagaJamina');
       }
    }
}
