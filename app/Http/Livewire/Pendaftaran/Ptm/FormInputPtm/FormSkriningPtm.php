<?php

namespace App\Http\Livewire\Pendaftaran\Ptm\FormInputPtm;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class FormSkriningPtm extends Component
{   protected $listeners = ['pencarian'];
    public $query;
    public function render()
    {
        return view('livewire.pendaftaran.ptm.form-input-ptm.form-skrining-ptm');
    }

    public function pencarian($nik, $tanggal)
    {
        $query = DB::table('pasiens')
                 ->join('skriningptms','pasiens.id','skriningptms.id_pasien')
                 ->join('kelurahans','pasiens.kel_id','kelurahans.id_kel')
                 ->join('kecamatans','kelurahans.kec_id','kecamatans.id_kec')
                 ->join('kotas','kecamatans.kota_id','kotas.kota_id')
                 ->where('pasiens.nik', $nik)->get();
        if($query)
        {
            $this->query = $query;
        }
    }
}
