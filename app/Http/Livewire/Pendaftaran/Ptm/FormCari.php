<?php

namespace App\Http\Livewire\Pendaftaran\Ptm;



use Livewire\Component;
use App\Models\pasien;
use App\Models\pasienPtm;

use Illuminate\Support\Facades\DB;
class FormCari extends Component
{   public $cari;
    public $form;
    public $kelurahan;
    public $prov;
    public $provinsi;
    public $kotas;



    public function render()
    {

        return view('livewire.pendaftaran.ptm.form-cari');
    }

    protected $rules=([
        'cari' => 'required||min:16',
    ]);

    protected $messages = ([
        'cari.min'      => 'NIK Minimal 16',
        'cari.required' => 'NIK Wajib diisi',
    ]);

    public function cek_ptm()
    {
        $this->validate();
        $ptm = pasien::where('nik',$this->cari)->first();

        if(!empty($ptm))
        {
            $this->dispatchBrowserEvent('alert',['title'=>'Data Pasien Telah Terdaftar','icon'=>'warning','btnConfrim'=>'OK']);
        }else{
            $this->emit('formAktif');
        }


    }
}
