<?php

namespace App\Http\Livewire\Poli;
use App\Models\poli;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;


class Tabel extends Component
{   protected $listeners = ['hapusPoli'=>'poliHapus'];
    use WithPagination; 
    public $editPoli;
    public $namaPoli;
    public $idPoli;
    public $status;
    protected $paginationTheme = 'bootstrap';
   
    public function render()
    {  
        return view('livewire.poli.tabel',[
            'query' => poli::orderBy('nama_poli','desc')->orderBy('status','asc')->paginate(10),
            'editPoli' => $this->editPoli,
        ]);
    }

    public function detailPoli($id)
    {
        $query = DB::table('polis')
                ->where('id_poli',$id)->first();
        if($query){
            $this->namaPoli = $query->nama_poli;
            $this->idPoli = $query->id_poli;
            
        }
    }

    public function update_poli()
    {
        $query = DB::table('polis')
            ->where('id_poli',$this->idPoli)
            ->update([
                'nama_poli' => $this->namaPoli,
                'status'    =>  $this->status,
            ]);
        if($query){
            $this->dispatchBrowserEvent('Edit',['title'=>'Berhasil','icon'=>'success','text'=>'Data Berhasil di Perbarui','colorBtn'=>'#5cb85c','btnTxt'=>'OK']);
            $this->namaPoli = '';
            $this->status = "";
            $this->idPoli="";
        }
    }
}
