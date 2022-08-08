<?php

namespace App\Http\Livewire\Pendaftaran\Kunjungan;

use Livewire\Component;
use App\Models\kunjungan;
use Livewire\WithPagination;
class Tabelkunjungan extends Component
{   
    
    public $tanggal;
    public $delate;
    use WithPagination;

    protected $listeners = ['hapus' => 'hapus'];
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.pendaftaran.kunjungan.tabelkunjungan',
        [
            'query' => kunjungan::where('tanggal',$this->tanggal)->orderby('created_at','desc')->orderby('created_at','desc')->paginate(10)
        ]);
        
    }

    public function mount()
    {
        $this->tanggal = date('Y-m-d');
    }

    public function cari(){
        dd('ddd');
    }

    public function konfirmasihapus($id){
        $this->dispatchBrowserEvent('konfirmasihapus');
        $this->delete = $id;
    }

    public function hapus(){
        $q= kunjungan::where('id',$this->delete)->delete();
        if($q)
        {
            $this->dispatchBrowserEvent('berhasilhapus');
            $this->render();
        }
    }
       
}
