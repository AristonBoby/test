<?php

namespace App\Http\Livewire\Tambahuser;

use Livewire\Component;
use app\Models\User;
use Livewire\WithPagination;
class Tabeluser extends Component
{   
    public $cari;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $data = User::where('name', $this->cari)
        ->orwhere('email', $this->cari)
        ->orwhere('name','LIKE','%'.$this->cari.'%')
        ->paginate(5);
        return view('livewire..tambahuser.tabeluser',['user'=>$data]);
    }
}
