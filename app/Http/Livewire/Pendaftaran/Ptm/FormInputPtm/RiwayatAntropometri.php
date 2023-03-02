<?php

namespace App\Http\Livewire\Pendaftaran\Ptm\FormInputPtm;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
class RiwayatAntropometri extends Component
{   protected $listeners = ['pencarian'];
    public $query;
    public function render()
    {
        return view('livewire.pendaftaran.ptm.form-input-ptm.riwayat-antropometri');
    }

    public function pencarian($id)
    {
        $query = DB::table('pasiens')
               ->join('skriningptms','pasiens.id','skriningptms.id_pasien')
               ->join('antropometris','skriningptms.id','antropometris.id_skrining')
               ->select('antropometris.*')
               ->where('pasiens.nik',$id)->get();
        $this->query = $query;
    }
}
