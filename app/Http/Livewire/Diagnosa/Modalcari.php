<?php

namespace App\Http\Livewire\Diagnosa;

use Livewire\Component;
use App\Models\icd;
use Illuminate\support\Facades\DB;
class Modalcari extends Component
{
    public $caridiagnosa;
    public $diagnosa;

    public function render()
    {
        return view('livewire.diagnosa.modalcari',[
            
        ]);
    }

    public function mount (){
        $this->diagnosa;
    }
    
    public function modaldiagnosa()
    {
        $query = DB::table('icd10')->paginate(10,'icd_code');
        return $this->diagnosa = $query;
       
        
    }
}
