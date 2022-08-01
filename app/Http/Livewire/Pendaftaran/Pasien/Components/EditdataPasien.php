<?php
namespace App\Http\Livewire\Pendaftaran\Pasien\Components;
use App\Models\pasien;
use Livewire\Component;
use Livewire\WithPagination;
class EditdataPasien extends Component
{   
    
    public $cariPasien;
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
    protected $rules =([
        'no_Rm'             => 'required|max:8',
        'nama'              => 'required',
        'tempat_Lahir'      => 'required',
        'tanggal_Lahir'     => 'required',
        'kepala_keluarga'   => 'required',
        'jenkel'            => 'required',
        'agama'             => 'required',
        'no_tlpn'           => 'required',
        'nik'               => 'max:16',
        'bpjs'              => 'max:13',
        'pekerjaan'         => 'required',
        'alamat'            => 'required',
    ]);
    protected $messages =[
        'no_Rm.required'=>'Nomor Rekam Medis wajib di isi',
        'max'=>'Nomor Rekam Medis Maksimal 8 Karakter',
        'nama.required'=>'Nama Pasien wajib diisi',
        'tempat_Lahir.required'=>'Tempat lahir Pasien wajib diisi',
        'tanggal_Lahir.required'=>'Tanggal lahir Pasien wajib diisi',
        'kepala_keluarga.required'=>'Kepala keluarga Pasien wajib diisi',
        'jenkel.required'=>'Jenis Kelamin Pasien wajib diisi',
        'agama.required'=>'Agama Pasien wajib diisi',
        'pekerjaan.required'=>'Pekerjaan Pasien wajib diisi',
        'no_tlpn.required'=>'Nomor Telepon / Hp Pasien wajib diisi',
        'alamat.required'=>'Alamat Pasien wajib diisi',
        'nik.unique'=>'NIK Pasien telah digunakan',
        'nik.max'=>'NIK Pasien Maksimal 16 karakter',
        'bpjs.unique'=>'Nomor BPJS Pasien telah digunakan',
        'bpjs.max'=>'Nomor BPJS Pasien Maksimal 13 Karakter',
    ];

    public function showUpdatePasien (){
        $query = pasien::where('nama','like','%'.$this->cariPasien.'%')->first();
        if($query){
            $this->id               =   $query->id;
            $this->nama             =   $query->nama; 
            $this->no_Rm            =   $query->no_Rm;
            $this->agama            =   $query->agama;
            $this->tempat_Lahir     =   $query->tempat_Lahir;
            $this->tanggal_Lahir    =   $query->tanggal_Lahir;
            $this->kepala_keluarga  =   $query->kepala_keluarga;
            $this->pekerjaan        =   $query->pekerjaan;
            $this->nik              =   $query->nik;
            $this->bpjs             =   $query->bpjs;
            $this->alamat           =   $query->alamat;
        }   
    }   
    public function edit ($data){
        $this->detailPasien($data);
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

    public function editPasien ()
    {   $this->validate();
        $query = pasien::find($this->id_pasien);
        $query->update([
            'no_Rm'             =>  $this->no_Rm,
            'nama'              =>  $this->nama,
            'agama'             =>  $this->agama,
            'tempat_Lahir'      =>  $this->tempat_Lahir,
            'tanggal_Lahir'     =>  $this->tanggal_Lahir,
            'kepala_keluarga'   =>  $this->kepala_keluarga,
            'jenkel'            =>  $this->jenkel,
            'pekerjaan'         =>  $this->pekerjaan,
            'nik'               =>  $this->nik,
            'bpjs'              =>  $this->bpjs,
            'alamat'            =>  $this->alamat,
            'no_tlpn'           =>  $this->no_tlpn,
        ]);
        if($query){
            $this->dispatchBrowserEvent('editPasien');
        }
    }

    public function deleteConfirmation($id){
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function hapusPasien(){
            $query = pasien::where('id', $this->delete_id)->delete();
            if($query){
                $this->dispatchBrowserEvent('hapus');
                $this->render();
            }else{
                dd('error');
            }
    }

}
