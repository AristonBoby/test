<?php

namespace App\Http\Livewire\Pendaftaran\Ptm;

use Livewire\Component;
use App\Models\provinsi;
use App\Models\kecamatan;
use Illuminate\Support\Facades\DB;
use App\Models\kelurahan;
use App\Models\kota;
use Illuminate\Support\Facades\Auth;
class Forminput extends Component
{
    public $form = true;
    public $kelurahan;
    public $kotas;
    public $nama;
    public $tanggal_Lahir;
    public $jenkel;
    public $agama;
    public $pekerjaan;
    public $no_tlpn;
    public $id_kel;
    public $idkelurahan;
    public $id_kec;
    public $kota_id;
    public $prov;
    public $alamat;
    public $nik;



    protected $listeners = ['formAktif' => 'aktifForm','formTidakAktif'=>'tidakAktif'];

    public function render()
    {
        return view('livewire.pendaftaran.ptm.forminput',[
            'provinsi'  =>  provinsi::all(),
            'kota'      =>  kota::where('prov_id',$this->prov)->get(),
            'kec'       =>  kecamatan::where('kota_id',$this->kota_id)->get(),
            'kel'       =>  kelurahan::where('kec_id',$this->id_kec)->get()
        ]);
    }

    public function aktifForm(){
        $this->form = false;
    }

    public function tidakAktif(){
        $this->form = true;
    }
    protected $rules=([
        'nik'   => 'required||unique:pasiens',
    ]);
    public function simpanPtm()
    {   
        $query = DB::table('pasiens')
                ->insert([
                'nama'              => $this->nama,
                'tanggal_Lahir'     => $this->tanggal_Lahir,
                'jenkel'            => $this->jenkel,
                'agama'             => $this->agama,
                'pekerjaan'         => $this->pekerjaan,
                'no_tlpn'           => $this->no_tlpn,
                'nik'               => $this->nik,
                'kel_id'            => $this->idkelurahan,
                'alamat'            => $this->alamat,
                'id_user'           => Auth::id(),
        ]);
    }
}
