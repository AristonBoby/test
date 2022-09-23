<?php

namespace App\Http\Livewire\Poli;
use App\Models\poli;
use Livewire\Component;
use Livewire\WithPagination;


class Tabel extends Component
{   protected $listeners = ['hapusPoli'=>'poliHapus'];
    use WithPagination; 
    public $idPoli='';
    protected $paginationTheme = 'bootstrap';
   
    public function render()
    {
        return view('livewire.poli.tabel',[
            'query' => poli::paginate(5),
        ]);
    }

    public function konfirmasiHapusPoli($id)
    {   
        $this->idPoli = $id;
        $this->dispatchBrowserEvent('hapus');
    }

    public function poliHapus()
    {
        $query = poli::where('id_poli',$this->idPoli)->delete();
        if ($query)
        {
            $this->render();
            $this->idPoli ='';
            $this->dispatchBrowserEvent('berhasilHapus');
        }
    }
}
