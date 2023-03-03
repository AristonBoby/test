<?php

namespace App\Http\Livewire\Pendaftaran\Ptm\FormInputPtm;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\antropometri;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\skriningPtm;
use Illuminate\Queue\Listener;

class InputDiagnosaPtm extends Component
{   public $sistole;
    public $diastole;
    public $tinggiBadan;
    public $beratBadan;
    public $lingkarPerut;
    public $glukosa;
    public $tanggal;
    public $idUser;
    public $form;
    protected $listeners = ['pencarian','aktifForm'];

    public function render()
    {
        return view('livewire.pendaftaran.ptm.form-input-ptm.input-diagnosa-ptm');
    }

    public function mount()
    {
        $this->form = true;
    }

    public function aktifForm($id)
    {
        $this->form = false;
    }

    private function resetForm()
    {
        $this->sistole = '';
        $this->diastole = '';
        $this->tinggiBadan = '';
        $this->beratBadan = '';
        $this->lingkarPerut = '';
        $this->glukosa = '';
    }
    public function inputPtm()
    {   $idSkrining = DB::table('pasiens')
                    ->join('skriningptms','pasiens.id','skriningptms.id_pasien')
                    ->select('skriningptms.id')
                    ->where('nik',$this->idUser)->first();
        $query = antropometri::create([
                'tanggal'       => Carbon::parse($this->tanggal)->format('Y-m-d'),
                'id_skrining'   => $idSkrining->id,
                'sistole'       => $this->sistole,
                'diastole'      => $this->diastole,
                'tinggi_badan'  => $this->tinggiBadan,
                'berat_badan'   => $this->beratBadan,
                'lingkar_perut' => $this->lingkarPerut,
                'glukosa'       => $this->glukosa,
                'id_user'       => Auth::id(),
        ]);

        if($query)
        {
            $this->form = true;
            $this->resetForm();
            $this->dispatchBrowserEvent('alert',['title'=>'Perhatian','icon'=>'success','text'=>'Data Berhasil Tersimpan','timer'=>2000]);

        }
    }

    public function pencarian($id, $tanggal)
    {
       $this->idUser = $id;
       $this->tanggal = $tanggal;
    }

}
