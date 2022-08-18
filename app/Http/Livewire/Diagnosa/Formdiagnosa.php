<?php

namespace App\Http\Livewire\Diagnosa;

use Livewire\Component;
use App\Models\kunjungan;
use App\Models\pasien;
use App\Models\icd;
use App\Models\diagnosa;
use App\Models\dokter;
class Formdiagnosa extends Component
{
    public $cari;
    public $diagnosa;
    public $query;
    public $tanggal;
    public $nama;
    public $no_Rm;
    public $id_pasien;
    public $tgl_lahir;
    public $nama_diagnosa;
    public $nik;
    public $id_kunjungan;
    public $jenkel;
    public $form = true;
    public $id_dokter;

    protected $listeners = ['tambahdiagnosa' => 'store','city_change' => 'city_change'];

    public function render()
    {
        return view('livewire.diagnosa.formdiagnosa',[
            'dokter'=>dokter::all()
        ]);
    }
    public function mount()
    {
        $this->tanggal = date('Y-m-d');
    }



    public function cek(){
        
        if(!empty($this->diagnosa))
        {
            $q = icd::where('icd_code',$this->diagnosa)->first();
            if($q)
            {
                $this->nama_diagnosa = $q->diagnosa;
            }
        }
    }


    public function clear(){

        $this->diagnosa         ="";
        $this->query            ="";
        $this->nama             ="";
        $this->no_Rm            ="";
        $this->id_pasien        ="";
        $this->tgl_lahir        ="";
        $this->nama_diagnosa    ="";
        $this->nik              ="";
        $this->id_kunjungan     ="";
        $this->jenkel           ="";
        $this->form             = false;
        $this->id_dokter        ="";
    }




    public function cekpasien()
    {   $this->clear();
        $data = pasien::where('no_Rm', $this->cari)->first();
        if($data===NULL)
        {
            $this->dispatchBrowserEvent('datatidakditemukan');
            $this->no_Rm        = '';
            $this->id_pasien    = '';
            $this->nama         ="";
            $this->tgl_lahir    ="";
            $this->nik          ='';
            $this->jenkel       ='';
        }else{
            $cari = kunjungan::where('id_pasien',$data->id)->where('tanggal',$this->tanggal)->first();
            if($cari)
            {
                $this->id_pasien    =   $data->id;
                $this->no_Rm        =   $data->no_Rm;
                $this->nama         =   $data->nama;
                $this->tgl_lahir    =   $data->tanggal_Lahir;
                $this->nik          =   $data->nik;
                $this->jenkel       =   $data->jenkel;
                $this->form         =   false;
                $this->id_kunjungan =   $cari->id;
            }else{
                $this->no_Rm        = '';
                $this->id_pasien    = '';
                $this->nama         ="";
                $this->tgl_lahir    ="";
                $this->nik          ='';
                $this->jenkel       ='';
                $this->dispatchBrowserEvent('datatidakditemukan');
            }
        }

    }

    public function store()
    {
        $query = diagnosa::create([
            'id_dokter'     =>  $this->id_dokter,
            'id_kunjungan'  =>  $this->id_kunjungan,
            'id_icd'        =>  $this->diagnosa,
        ]);
        if($query){
            $this->dispatchBrowserEvent('diagnosa');
            $this->no_Rm        = '';
            $this->id_pasien    = '';
            $this->id_kunjungan    = '';
            $this->nama_diagnosa    = '';
            $this->diagnosa    = '';
            $this->nama         ="";
            $this->tgl_lahir    ="";
            $this->nik          ='';
            $this->jenkel       ='';
            $this->form = true;
        }
    }
    
}
