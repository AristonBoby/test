<?php

namespace App\Http\Livewire\Diagnosa;

use Livewire\Component;
use App\Models\icd;
use Illuminate\support\Facades\DB;
class Modalcari extends Component
{
    public $caridiagnosa;


    public function render()
    {
        return view('livewire.diagnosa.modalcari', [
            'diagnosa' => icd::where('icd_code','LIKE','%'.$this->caridiagnosa.'%')->orWhere('diagnosa','LIKE','%'.$this->caridiagnosa.'%')->paginate(10)
        ]);
    }
}
