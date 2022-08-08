<?php
namespace App\Http\Livewire\Pendaftaran\Pasien\Components;
use App\Models\pasien;
use Livewire\Component;
use Livewire\WithPagination;
class EditdataPasien extends Component
{   
    
    public $nama;
    public $no_Rm;
    public $tempat_Lahir;
    public $tanggal_Lahir; 
    public $kepala_keluarga;
    public $pekerjaan;
    public $jenkel;
    public $agama;
    public $no_tlpn;
    public $nik,$bpjs,$alamat;
    public $delete_id;
    public $tanggal;
    public $id_pasien;


    use WithPagination;
    protected $listeners = ['deleteConfirmed' => 'hapusPasien'];
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.pendaftaran.pasien.components.editdata-pasien', [
                        'pasien'=> pasien::where('created_at', 'like', '%' .$this->tanggal. '%')->paginate(10)
                    ]);
        
    }
    public function index ()
    { 
        return view('livewire.pendaftaran.pasien.editdata-Pasien');
        
    }

    public function mount(){
        $this->tanggal_Lahir = date('Y-m-d');
        $this->tanggal = date('Y-m-d');
    }

    public function detailPasien($data){
           $query = pasien::find($data);
           if($query){
            $this->id_pasien        =   $query->id;
            $this->nama             =   $query->nama; 
            $this->no_Rm            =   $query->no_Rm;
            $this->agama            =   $query->agama;
            $this->tempat_Lahir     =   $query->tempat_Lahir;
            $this->tanggal_Lahir    =   $query->tanggal_Lahir;
            $this->kepala_keluarga  =   $query->kepala_keluarga;
            $this->jenkel           =   $query->jenkel;
            $this->pekerjaan        =   $query->pekerjaan;
            $this->nik              =   $query->nik;
            $this->bpjs             =   $query->bpjs;
            $this->alamat           =   $query->alamat;   
            $this->no_tlpn          =   $query->no_tlpn;
        }
    }
}
