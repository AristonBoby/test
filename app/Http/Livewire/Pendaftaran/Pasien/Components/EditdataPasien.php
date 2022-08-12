<?php
namespace App\Http\Livewire\Pendaftaran\Pasien\Components;
use App\Models\pasien;
use Livewire\Component;
use Livewire\WithPagination;
use  App\Models\provinsi;
use App\Models\kecamatan;
use App\Models\kelurahan;
use App\Models\kota;
use Illuminate\Support\Facades\DB;
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
    public $kel_name;
    public $kec_name;
    public $kota_name;
    public $prov_name;
    public $prov;
    public $kotas;
    public $kecamatan;


    use WithPagination;
    protected $listeners = ['deleteConfirmed' => 'hapusPasien'];
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.pendaftaran.pasien.components.editdata-pasien', [
                        'pasien'=> pasien::where('created_at', 'like', '%' .$this->tanggal. '%')->orderby('created_at','desc')->paginate(10),
                        'provinsi'  =>  provinsi::all(),
                        'kota'      =>  kota::where('prov_id',$this->prov)->get(),
                        'kec'       =>  kecamatan::where('kota_id',$this->kotas)->get(),
                        'kel'       =>  kelurahan::where('kec_id',$this->kecamatan)->get()
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

           $query = DB::table('pasiens')
                    ->join('kelurahans','pasiens.kel_id','kelurahans.id_kel')
                    ->join('kecamatans','kelurahans.kec_id','kecamatans.id_kec')
                    ->join('kotas','kecamatans.kota_id','kotas.kota_id')
                    ->join('provinsis','kotas.prov_id','provinsis.prov_id')
                    ->select('*','kelurahans.kel_name','kecamatans.kec_name','kotas.kota_name','provinsis.prov_name')
                    ->where('pasiens.id',$data)->first();

           if($query){
            $this->kel_name         =   false;
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
            $this->kec_name         =   $query->kec_name;
            $this->kel_name         =   $query->kel_name;
            $this->kota_name        =   $query->kota_name;
            $this->prov_name        =   $query->prov_name;
        }else{
            $query = pasien::find($data);
            $this->kec_name         =   null;
            $this->kel_name         =   null;
            $this->kota_name        =   null;
            $this->prov_name        =   null;
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
