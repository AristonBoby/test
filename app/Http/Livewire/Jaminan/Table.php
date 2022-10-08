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
        'id_jaminan'    =>  'required|unique:jaminans',
        'jaminan'       =>  'required',
        'status'        =>  'required'
    ];

    protected $messages = [
        'id_jaminan.required'    => 'ID Jaminan Wajib DIisi',
        'id_jaminan.unique'      => 'ID Jaminan Telah Di Gunakan',
        'jaminan.required'       => 'Jaminan Wajib Diisi',
        'status.required'        => 'Status Wajib Diisi'
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
