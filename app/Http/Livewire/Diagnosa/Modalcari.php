<?php

namespace App\Http\Livewire\Diagnosa;

use Livewire\Component;
use App\Models\icd;
use Illuminate\support\Facades\DB;
use Livewire\WithPagination;
use Maatwebsite\Excel\Concerns\ToArray;

class Modalcari extends Component
{
    public $cariicd;
    public $codeDiagnosa;

    

    public function render()
    {
        return view('livewire.diagnosa.modalcari',[
            'diag'=>icd::where('icd_code',$this->cariicd)->orWhere('diagnosa','LIKE','%'.$this->cariicd.'%')->paginate(10)
        ]);
    }

    public function dataDiagnosa($id)
    {
        $this->emit('pencarianDiagnosa',$id);
        $this->cariicd ='';
    }
   
}