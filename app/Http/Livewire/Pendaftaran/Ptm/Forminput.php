<?php

namespace App\Http\Livewire\Pendaftaran\Ptm;

use Livewire\Component;
use App\Models\provinsi;
use App\Models\kecamatan;
use App\Models\kelurahan;
use App\Models\kota;
class Forminput extends Component
{   
    protected $listeners= ['ptmData'=>'form'];
    public $form = true;
    public $kelurahan;
    public $prov;
    public $kotas;
    public $nama;
    public $tgl_lahir;
    public $jenkel;
    public $agama;
    public $pekerjaan;
    public $no_tlpn;
    public $id_kel;
    public $kel_id;
    public $id_kec;
    public $kota_id;
    public $prov_id;

    public function render()
    {
        return view('livewire.pendaftaran.ptm.forminput',[
            'provinsi'  =>  provinsi::all(),
            'kota'      =>  kota::where('prov_id',$this->prov_id)->get(),
            'kec'       =>  kecamatan::where('kota_id',$this->kota_id)->get(),
            'kel'       =>  kelurahan::where('kec_id',$this->id_kec)->get()
        ]);
    }

    public function form($id)
    {
       if(!empty($id))
       {
        $this->dispatchBrowserEvent('alert',['title'=>'Data Pasien Ditemukan Pada Databases Pasien','icon'=>'success','text'=>'Data Pasien Berhasil Ditemukan','btnConfrim'=>'OK']);
        $this->form = false;
        $this->nama = $id['nama'];
        $this->tgl_lahir = $id['tanggal_Lahir'];
        $this->jenkel = $id['jenkel'];
        $this->agama = $id['agama'];
        $this->pekerjaan = $id['pekerjaan'];
        $this->no_tlpn = $id['no_tlpn'];
        $this->nik = $id['nik'];
        $this->alamat = $id['alamat'];
        $this->kel_id = $id['kel_id'];
        $this->prov_id = $id['prov_id'];
        $this->id_kec = $id['id_kec'];
        $this->kota_id = $id['kota_id'];
       }else{
        $this->form = false;
       }

    }
}
