<?php

namespace App\Http\Livewire\Diagnosa;

use Livewire\Component;
use App\Models\icd;
use Illuminate\support\Facades\DB;
use Livewire\WithPagination;
class Modalcari extends Component
{
    public $cariicd =" ";
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.diagnosa.modalcari',[
            'diag' => icd::where('icd_code','like','%'.$this->cariicd.'%')->orwhere('diagnosa','like','%'.$this->cariicd.'%')->paginate(10)
        ]);
    }

    public function mount()
    {
        $this->cariicd; 
    }

}
