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
    public $diagnosa=[];
    public $diagnosaName=[];
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

    public $i=1;
    public $diagnosas=[1];

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

    public function modalCari($no)
    {
        dd($no);
    }

    public function addDiagnosa($no)
    {
        $no = $no + 1;
        $this->i = $no;
        array_push($this->diagnosas ,$no);
    }

    public function removeDiagnosa($no)
    {
        unset($this->diagnosas[$no]);
        array_push($this->diagnosas);
    }

    public function cek($id){
        $data = icd::where('icd_code', $this->diagnosa[$id])->first(); 
        if ($data)
        {
            $this->diagnosaName[$id] = $data->diagnosa;
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

    public function test(){
        for ($i = 0; $i < count($this->diagnosa); $i++)
        {
            $query = diagnosa::create([
                'id_dokter'     =>  $this->id_dokter,
                'id_kunjungan'  =>  $this->id_kunjungan,
                'id_icd'        =>  $this->diagnosa[$i],
            ]);
        }
    }

    public function store()
    {        
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
