<?php

namespace App\Http\Livewire\Poli;
use App\Models\poli;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;


class Tabel extends Component
{   
    use WithPagination; 
    public $editPoli;
    public $namaPoli;
    public $idPoli;
    public $status;
    public $var_halaman;
    protected $paginationTheme = 'bootstrap';
    public $listeners = ['hapusPoli'=>'hapusPoli','poliRestore','poliRestore'];
    public function render()
    {  
        return view('livewire.poli.tabel',[
            'query' => poli::orderBy('nama_poli','desc')->orderBy('status','asc')->get(),
            'editPoli' => $this->editPoli,
        ]);
    }

    public function mount(){
        $this->var_halaman=1;
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

    public function halaman($id){
        $this->var_halaman = $id;
    }

    public function confirmHapus($id){
        $this->idPoli = $id;       
        $this->dispatchBrowserEvent('confirmHapus',['title'=>'Hapus Poli','text'=>'Data poli yang dihapus dapat dikembalikan pada menu Riwayat Terhapus','icon'=>'warning']);
    }
    
    public function restorePoli($id){
        $this->idPoli = $id;       
        $this->dispatchBrowserEvent('restorePoli',['title'=>'Perhatian','text'=>'Apakah anda ingin mengembalikan poli','icon'=>'warning']);
    }

    public function poliRestore()
    {
        $query = DB::table('polis')
                ->where('id_poli',$this->idPoli)
                ->update([
                    'status' => 1,
                ]);
        $this->idPoli="";
    }

    
    public function hapusPoli()
    {
        $query = DB::table('polis')
                ->where('id_poli',$this->idPoli)
                ->update([
                    'status' => 3,
                ]);
        $this->idPoli="";
    }
}  
