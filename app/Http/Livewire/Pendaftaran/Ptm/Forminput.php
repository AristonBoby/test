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
        $this->form = true;
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
        'id_kec'        => 'required',
        'alamat'        => 'required',
        'kota_id'       => 'required',
        'prov'          => 'required',
    ]);

    protected $messages = ([
        'nik.unique'                => 'NIK Telah Digunakan',
        'nik.required'              => 'NIK Pasien Wajib Diisi',
        'nama.required'             => 'Nama Pasien Wajib Diisi',
        'tanggal_Lahir.required'    => 'Tanggal Lahir Pasien Wajib Diisi',
        'jenkel.max'                => 'Jenis Kelamin Pasien Wajib Diisi',
        'jenkel.min'                => 'Jenis Kelamin Pasien Wajib Diisi',
        'jenkel.required'           => 'Jenis Kelamin Pasien Wajib Diisi',
        'agama.required'            => 'Agama Pasien Wajib Diisi',
        'pekerjaan.required'        => 'Agama Pasien Wajib Diisi',
        'no_tlpn.required'          => 'No. Telepon / HP Pasien Wajib Diisi',
        'no_tlpn.min'               => 'No. Telepon / HP Minimal 10 Karakter',
        'prov.required'             => 'Provinsi Pasien Wajib Diisi',
        'kota_id.required'          => 'Kab/Kota Pasien Wajib Diisi',
        'id_kec.required'           => 'Kecamatan Pasien Wajib Diisi',
        'idkelurahan.required'      => 'Kelurahan Pasien Wajib Diisi',
        'alamat.required'      => 'Kelurahan Pasien Wajib Diisi',


    ]);

    public function simpanPtm()
    {   $this->validate();
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
