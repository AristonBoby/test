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
    public $idModal;
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

    protected $listeners = ['tambahdiagnosa' => 'store','pencarianDiagnosa' => 'pencarianDiagnosa'];

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
        $this->idModal = $no;
    }

    public function pencarianDiagnosa($id){
        $data = icd::where('icd_code', $id)->first();
            $this->diagnosa[$this->idModal] = $id;
            $this->diagnosaName[$this->idModal] = $data->diagnosa;
            $this->dispatchBrowserEvent('closeModal'); 
        // dd($data->icd_code);

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

    public function clear()
    {   $this->diagnosa=[];
        $this->diagnosas=[1];
        $this->diagnosaName=[];
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
    {  
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
            
                $this->cekDiagnosa($cari->id_kunjungan);

                $this->clear();
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

    private function cekDiagnosa($id)
    {
        $var_cekDiagnosa = diagnosa::where('id_kunjungan',$id)->first();
    }

    public function test(){
        // Proses Cek Data Kunjungan pada table diagnosas Apakah telah di input // 
        $cek_Kunjungan = diagnosa::where('id_kunjungan',$this->id_kunjungan)->first();
        dd($cek_Kunjungan);
        // proses cek jika diagnosa tidak ada kosong //
        if(empty($cek_Kunjungan))
        {
            for ($i = 0; $i < count($this->diagnosa); $i++)
                {
                    $query = diagnosa::create([
                        'id_dokter'     =>  $this->id_dokter,
                        'id_kunjungan'  =>  $this->id_kunjungan,
                        'id_icd'        =>  $this->diagnosa[$i],
                    ]);
                }

            if($query)
                {
                    $this->clear();
                    $this->dispatchBrowserEvent('diagnosa');
                }
        }
        // Jika diagnosa telah di input //
        else{
            $this->dispatchBrowserEvent('alert',['title'=>'Perhatian']);
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
