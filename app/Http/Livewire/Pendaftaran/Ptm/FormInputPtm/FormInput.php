<?php

namespace App\Http\Livewire\Pendaftaran\Ptm\FormInputPtm;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class FormInput extends Component
{   public $listeners = ['ubahTanggal'];
    public $varTanggal  = '';
    public $nik         = '';
    public function render()
    {
        return view('livewire.pendaftaran.ptm.form-input-ptm.form-input');
    }

    public function mount()
    {
        $this->varTanggal = date('d-m-Y');
    }

    public function ubahTanggal($id)
    {
        $this->varTanggal = $id;
    }

    public function pencarianPtm()
    {
        $query = DB::table('pasiens')
            ->join('skriningptms','pasiens.id','skriningptms.id_pasien')
            ->where('nik',$this->nik)->first();
        $skrining = DB::table('pasiens')
            ->where('nik',$this->nik)->first();

        if(!empty($query))
        {
            $this->emit('pencarian', $this->nik, $this->varTanggal);
            $this->emit('aktifForm', false);
        }
        elseif(!empty($skrining))
        {   $this->emit('pencarian', $this->nik, $this->varTanggal);
            $this->dispatchBrowserEvent('alert',['title'=>'Perhatian','icon'=>'warning','text'=>'Pasien Belum Skrining','timer'=>2000]);
        }
        else{
            $this->emit('pencarian', $this->nik, $this->varTanggal);
            $this->dispatchBrowserEvent('alert',['title'=>'Perhatian','icon'=>'error','text'=>'Pasien Belum Terdaftar','timer'=>2000]);
        }
    }
}
