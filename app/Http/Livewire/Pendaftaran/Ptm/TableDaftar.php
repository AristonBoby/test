<?php

namespace App\Http\Livewire\Pendaftaran\Ptm;
use Livewire\Component;
use App\Models\pasien;
use Illuminate\Support\Carbon;
use Livewire\WithPagination;

use Illuminate\Support\Facades\DB;
class TableDaftar extends Component
{   public $tanggal;
    public $tgl;
    use WithPagination; 
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['tanggal'=>'tanggal'];
   

    public function updatingTgl()
    {
        $this->resetPage();
    }

    public function render()
    {   
        return view('livewire.pendaftaran.ptm.table-daftar',[
            'ptm' => DB::table('pasiens')
                    ->join('users','pasiens.id_user','users.id')
                    ->select('pasiens.id','pasiens.no_Rm','pasiens.nama','tanggal_Lahir','jenkel','nik','bpjs','users.name','skrining')
                    ->where('pasiens.created_at','LIKE','%'.$this->tgl.'%')->where('status',1)->orderBy('pasiens.no_Rm','desc')->paginate(10),
        ]);
    }

    public function mount()
    {
        $this->tanggal = date('d-m-Y');
    }

    public function tanggal($tanggal)
    {
        $this->tgl = Carbon::parse($tanggal)->format('Y-m-d');
    }
}
