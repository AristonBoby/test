<?php

namespace App\Http\Livewire\Tambahuser;

use Livewire\Component;
use app\Models\User;
use Livewire\WithPagination;
class Tabeluser extends Component
{   
    public  $cari;
    public  $idhapus;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['refresh'   => 'render','hapususer'=>'hapususer'];

    public function render()
    {
        $data = User::where('name', $this->cari)
        ->orwhere('email', $this->cari)
        ->orwhere('name','LIKE','%'.$this->cari.'%')
        ->paginate(5);
        return view('livewire..tambahuser.tabeluser',['user'=>$data]);
    }

    public function konfirmasihapususer($id)
    {
        $this->dispatchBrowserEvent('konfirmasihapususer');
        
        $this->idhapus = $id;
    }

    public function hapususer()
    {
        $hapus  =   User::find($this->idhapus)->delete();
        
        if($hapus)
        {
            $this->dispatchBrowserEvent('berhasil');
            $this->render();
        }
    }
}
