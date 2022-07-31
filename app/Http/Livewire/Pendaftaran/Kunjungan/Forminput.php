<?php

namespace App\Http\Livewire\Pendaftaran\Kunjungan;
use Illuminate\Support\Facades\Auth;
use App\Models\poli;
use App\Models\pasien;
use App\Models\kunjungan;
use Livewire\Component;

class Forminput extends Component
{
    public $tanggal;
    public $cari;
    public $poli;
    public $no_Rm;
    public $nama;
    public $tanggal_Lahir;
    public $bpjs;
    public $nik;
    public $no_tlpn;
    public $id_pasien;
    public $form = true;
  
    public $cari_Pasien_no_RM;
    
    public function render()
    {
        return view('livewire.pendaftaran.kunjungan.forminput',['pilihpoli' => poli::all()]);
    }

    public function mount(){
        $this->tanggal = date('Y-m-d');
    }

    public function clear(){
        $this->id_pasien        = "";
        $this->tanggal          = date('Y-m-d');
        $this->poli             = "";
        $this->nama             = "";
        $this->no_Rm            = "";
        $this->tanggal_lahir    = "";
        $this->nik              = "";
        $this->bpjs             = "";
        $this->no_tlpn          = "";
        $this->tanggal_Lahir    = "";
        $this->form             = true;
    } 
    public function cekpasien(){

        $query = pasien::where('nik',$this->cari)
                        ->orWhere('no_Rm',$this->cari)
                        ->orWhere('bpjs',$this->cari)->first();

        if($query)
        {
            $this->id_pasien        =   $query->id;
            $this->no_Rm            =   $query->no_Rm;
            $this->nama             =   $query->nama;
            $this->tanggal_Lahir    =   $query->tanggal_Lahir;
            $this->bpjs             =   $query->bpjs;
            $this->nik              =   $query->nik;
            $this->no_tlpn          =   $query->no_tlpn;
            $this->form = false;
        }else{
            $this->dispatchBrowserEvent('dataTidakDitemukan');
            $this->form = true;
        }
    }
    protected $rules = [
        'id_pasien' => 'required',
        'tanggal'   => 'required',
        'poli'   => 'required',
    ];

    public function simpanKunjungan (){
        $this->validate();
      $query = kunjungan::create([
                'id_pasien' =>  $this->id_pasien,
                'tanggal'   =>  $this->tanggal,
                'id_user'   =>  Auth::id(),
                'id_poli'   =>  $this->poli,
      ]);

      if($query)
      {
        $this->dispatchBrowserEvent('kunjunganBerhasil');
        $this->clear();
      }
    }

}