<?php

namespace App\Http\Livewire\Pendaftaran\Pasien\Components;

use Livewire\Component;
use App\Models\pasien;
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
    public $nik;
    public $bpjs;
    public $alamat;



    public function mount(){
        $this->tanggal_Lahir = date('Y-m-d');
    }
    public function render()
    {
        return view('livewire.pendaftaran.pasien.components.pasienbaru');
    }
    
    public function index ()
    {
        return view('livewire.pendaftaran.pasien.index');
    }

    protected $rules = [
        'no_Rm'             => 'required|unique:pasiens',
        'nama'              => 'required',
        'tempat_Lahir'      => 'required',
        'tanggal_Lahir'     => 'required',
        'kepala_keluarga'   => 'required',
        'jenkel'            => 'required',
        'agama'             => 'required',
        'no_tlpn'           => 'required',
        'nik'               => 'unique:pasiens|max:16',
        'bpjs'              => 'unique:pasiens|max:13',
        'pekerjaan'         => 'required',
        'alamat'            => 'required',
    ];

    public function store(){
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
            $this->dispatchBrowserEvent('simpan');
        }

    }

    
}
