<?php

namespace App\Http\Livewire\Pendaftaran\Ptm;

use Livewire\Component;
use App\Models\provinsi;
use App\Models\kecamatan;
use Illuminate\Support\Facades\DB;
use App\Models\kelurahan;
use App\Models\pasien;
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

    public function resetForm()
    {
        $this->nik              = '';
        $this->nama             = '';
        $this->tanggal_Lahir    = '';
        $this->jenkel           = '';
        $this->agama            = '';
        $this->pekerjaan        = '';
        $this->idkelurahan      = '';
        $this->alamat           = '';
        $this->id_kec           = '';
        $this->kota_id          = '';
        $this->prov             = '';
    }

    protected $rules = ([
        'nik'           => 'required||unique:pasiens||min:16||max:16',
        'nama'          => 'required',
        'tanggal_Lahir' => 'required',
        'jenkel'        => 'required||min:1||max:1',
        'agama'         => 'required',
        'pekerjaan'     => 'required',
        'no_tlpn'       => 'required||min:10',
        'idkelurahan'   => 'required',
        'idkelurahan'   => 'required',
        'id_kec'        => 'required',
        'alamat'        => 'required',
        'kota_id'       => 'required',
        'prov'          => 'required',
    ]);

    public function simpanPtm()
    {
        $query = pasien::create([
                'nama'              => $this->nama,
                'tanggal_Lahir'     => $this->tanggal_Lahir,
                'jenkel'            => $this->jenkel,
                'agama'             => $this->agama,
                'pekerjaan'         => $this->pekerjaan,
                'no_tlpn'           => $this->no_tlpn,
                'nik'               => $this->nik,
                'kel_id'            => $this->idkelurahan,
                'alamat'            => $this->alamat,
                'status'            => 1,
                'id_user'           => Auth::id(),
        ]);

        if($query)
        {
            $this->resetForm();
            $this->dispatchBrowserEvent('alert',['title'=>'Berhasil','icon'=>'success','text'=>'Data Pasien PTM Berhasil Tersimpan','timer'=>2000]);
        }
    }
}
