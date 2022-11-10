<?php

namespace App\Http\Livewire\Pendaftaran\Pasien\Components;

use Livewire\Component;
use App\Models\pasien;
use App\Models\provinsi;
use App\Models\kota;
use App\Models\kecamatan;
use App\Models\kelurahan;
use Illuminate\Support\Facades\Auth;
class Pasienbaru extends Component
{   
    public $no_Rm;
    public $nama;
    public $tempat_Lahir;
    public $tanggal_Lahir;
    public $kepala_keluarga;
    public $jenkel;
    public $agama;
    public $no_tlpn;
    public $pekerjaan;
    public $nik ='';
    public $bpjs='';
    public $alamat;
    public $prov; // Variabel Provinsi 
    public $kotas; //Vairabel Kota
    public $kecamatan;  //Variabel Kelurahan
    public $kelurahan; //Variabel Kelurahan
    public $idkelurahan;


    public function mount(){
        $this->tanggal_Lahir = date('Y-m-d');
        $this->prov;
    }
    public function render()
    {
        return view('livewire.pendaftaran.pasien.components.pasienbaru',[
            'provinsi'  =>  provinsi::all(),
            'kota'      =>  kota::where('prov_id',$this->prov)->get(),
            'kec'       =>  kecamatan::where('kota_id',$this->kotas)->get(),
            'kel'       =>  kelurahan::where('kec_id',$this->kelurahan)->get()
        ]);
    }
    
    public function index ()
    {
        return view('livewire.pendaftaran.pasien.index');
    }

    protected $rules =([
        'no_Rm'             => 'required|unique:pasiens|max:8',
        'nama'              => 'required',
        'tempat_Lahir'      => 'required',
        'tanggal_Lahir'     => 'required',
        'kepala_keluarga'   => 'required',
        'jenkel'            => 'required',
        'agama'             => 'required',
        'no_tlpn'           => 'required',
        'nik'               => 'unique:pasiens',
        'bpjs'              => 'unique:pasiens',
        'pekerjaan'         => 'required',
        'alamat'            => 'required',
        'idkelurahan'       => 'required',
    ]);

    protected $messages =[
        'no_Rm.required'            =>'Nomor Rekam Medis wajib di isi',
        'no_Rm.unique'              =>'Nomor Rekam Medis telah digunakan',
        'max'                       =>'Nomor Rekam Medis Maksimal 8 Karakter',
        'nama.required'             =>'Nama Pasien wajib diisi',
        'tempat_Lahir.required'     =>'Tempat lahir Pasien wajib diisi',
        'tanggal_Lahir.required'    =>'Tanggal lahir Pasien wajib diisi',
        'kepala_keluarga.required'  =>'Kepala keluarga Pasien wajib diisi',
        'jenkel.required'           =>'Jenis Kelamin Pasien wajib diisi',
        'agama.required'            =>'Agama Pasien wajib diisi',
        'pekerjaan.required'        =>'Pekerjaan Pasien wajib diisi',
        'no_tlpn.required'          =>'Nomor Telepon / Hp Pasien wajib diisi',
        'alamat.required'           =>'Alamat Pasien wajib diisi',
        'nik.unique'                =>'NIK Pasien telah digunakan',
        'bpjs.unique'               =>'Nomor BPJS Pasien telah digunakan',
        'idkelurahan.required'      => 'Kelurahan tidak boleh kosong',
    ];
    private function validasi(){
        
        // Pengecekan Nomor Rekam Medis Yang Ganda //
        if(!empty($this->no_Rm))
        {
            $cekNoRm = pasien::where('no_Rm',$this->no_Rm)->first();
            if($cekNoRm)
            {
                $this->dispatchBrowserEvent('alert',['title'=>'Perhatian','icon'=>'warning','text'=>'Nomor Rekam Medis Telah Digunakan !!!']);
                return back();
            }
        }
        // ===//

        
        if(empty($this->no_Rm))
        {
            $this->dispatchBrowserEvent('alert',['title'=>'Perhatian','icon'=>'warning','text'=>'Nomor Rekam Medis Wajib Diisi !!!']);
            return back();
        }
        if(!empty($this->bpjs) && empty($this->nik))
        {
            $this->dispatchBrowserEvent('alert',['title'=>'Perhatian','icon'=>'warning','text'=>'NIK Wajib Diisi !!!']);
            return back();
        }
    }

    public function store(){
        $this->validasi();
        $this->validate();
        $query = pasien::create([
                    'no_Rm'             => $this->no_Rm,
                    'nama'              => $this->nama,
                    'tempat_Lahir'      => $this->tempat_Lahir,
                    'tanggal_Lahir'     => $this->tanggal_Lahir,
                    'kepala_keluarga'   => $this->kepala_keluarga,
                    'jenkel'            => $this->jenkel,
                    'agama'             => $this->agama,
                    'pekerjaan'         => $this->pekerjaan,
                    'no_tlpn'           => $this->no_tlpn,    
                    'nik'               => $this->nik,
                    'bpjs'              => $this->bpjs,
                    'kel_id'            => $this->idkelurahan,
                    'alamat'            => $this->alamat,
                    'id_user'           => Auth::id(),
            ]);
        if($query){
                    $this->no_Rm           = "";
                    $this->nama            = "";
                    $this->tempat_Lahir    = "";
                    $this->tanggal_Lahir   = date('Y-m-d');  
                    $this->kepala_keluarga = "";
                    $this->jenkel          = "";
                    $this->agama           = "";
                    $this->pekerjaan       = "";
                    $this->nik             = "";
                    $this->no_tlpn         = "";
                    $this->bpjs            = "";
                    $this->alamat          = "";
                    $this->prov            = "";
                    $this->kotas           = "";
                    $this->kecamatan       = "";
                    $this->kelurahan       = "";
                    $this->render();

                $this->dispatchBrowserEvent('alert',['title'=>'Berhasil','icon'=>'success','text'=>'Data Berhasil Tersimpan']);
        }

    }

    
}
