<?php

namespace App\Http\Livewire\Jaminan;

use Livewire\Component;
use App\Models\jaminan;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class TabelJaminan extends Component
{  
    use WithPagination;
    public $id_jaminan;
    public $status;
    public $halaman=1;
    public $jamin;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['hapus'=>'hapus','restoreKunjungan'=>'restoreKunjungan'];
    
    public function render()
    {
        return view('livewire.jaminan.tabel-jaminan',[
            'jaminan'   => jaminan::where('status','1' || 'status','2')->orderBy('status','asc')->paginate(5),
            'halaman'   =>  $this->halaman,
            'dataHapus' => jaminan::where('status',3)->paginate(5)
        ]);
    }

    protected $rules = [
        'jamin'          =>  'required|max:25',
        'status'         =>  'required|max:1',
    ];

    protected $messages = [
        'jamin.max'            => 'Jaminan Mininmal 25 Karakter',
        'jamin.required'       => 'Jaminan wajib diisi',
        'status.required'      => 'Status wajib diisi',
    ];
     
    public function cariData($id){
        $this->id_jaminan = $id;
                $query = DB::table('jaminans')
                        ->where('id_jaminan',$this->id_jaminan)
                        ->first();
        if($query){
            $this->id_jaminan = $query->id_jaminan;
            $this->jamin      = $query->jaminan;
            $this->status     = $query->status;
        }
    }
    
    public function editKunjungan(){
        $this->validate();
        $query = DB::table('jaminans')
                 ->where('id_jaminan',$this->id_jaminan)
                 ->update([
                    'jaminan'   => $this->jamin,
                    'status'    => $this->status
                 ]);
        if($query){
            $this->dispatchBrowserEvent('berhasil',['title'=>'Berhasil','text'=>'Data Berhasil Tersimpan','icon'=>'success','btnTxt'=>'Ok']);
        }else{
            $this->dispatchBrowserEvent('berhasil',['title'=>'Berhasil','text'=>'Data Berhasil Tersimpan','icon'=>'error','btnTxt'=>'Ok']);
        }   
    }
    public function hapusKunjungan($id){
        $this->cariData($id);

        if(!is_null($this->status)){
            $this->dispatchBrowserEvent('konfirmasihapus', ['title'=> 'Hapus Jaminan','icon'=>'warning','text'=>'Apakah ingin menghapus data Jaminan (data yang dihapus tidak benar-benar terhapus data dapat dikembalikan pada menu riwayat jaminan terhapus )']);
        }
    }

    public function hapus(){
        $query = DB::table('jaminans')
                ->where('id_jaminan',$this->id_jaminan)
                ->update([
                    'status' => 3 
                ]);
        if($query){
            $this->dispatchBrowserEvent('berhasil',['url'=>'hapus','title'=>'Berhasil','text'=>'Data Berhasil Tersimpan','icon'=>'success','btnTxt'=>'Ok']);
        }
    }
  
    public function pilihHalaman($id)
    {
        $this->halaman = $id;
    }

    public function restore($id)
    {   $this->id_jaminan = $id;
        if($this->id_jaminan){
            $this->dispatchBrowserEvent('edit', ['title'=> 'Perhatian','icon'=>'warning','text'=>'Apakah anda ingin mengembalikan data Jaminan yang telah dihapus ?']);
        }
    }

    public function restoreKunjungan()
    {
        $query = DB::table('jaminans')
        ->where('id_jaminan',$this->id_jaminan)
        ->update([
            'status' => 1 
        ]);
        if($query){
            $this->dispatchBrowserEvent('berhasil',['url'=>'hapus','title'=>'Berhasil','text'=>'Data Berhasil Tersimpan','icon'=>'success','btnTxt'=>'Ok']);
        } 
    }
}
