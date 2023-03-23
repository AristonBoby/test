<?php

namespace App\Http\Livewire\Pendaftaran\Kunjungan;
use App\Models\pasien;
use Livewire\Component;
use Livewire\WithPagination;
class Modalcaripasien extends Component
{
    public $cari="";
    public $caridatapasien = null;
    private $queryData = null;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';


    public function render()
    {   $this->queryData = pasien::where('no_Rm', $this->caridatapasien)
                        ->orwhere('nama','Like','%'.$this->caridatapasien.'%')
                        ->orwhere('nik','LIKE','%'.$this->caridatapasien.'%')
                        ->orwhere('bpjs','LIKE','%'.$this->caridatapasien.'%')
                        ->orderby('created_at','desc')
                        ->paginate(10, ['*'], 'cariPasien');
        if($this->caridatapasien == '')
        {
            $this->queryData = '';
        }
        return view('livewire.pendaftaran.kunjungan.modalcaripasien',  [
            'query' => $this->queryData
        ]);
    }

    public function hapuscari()
    {
        $this->caridatapasien = null;
        $this->cari = '';
        $this->resetPage('cariPasien');
    }

    public function caridatamodal(){

        $this->caridatapasien = $this->cari;
        $this->resetPage('cariPasien');
    }
    public function cariPasien($no_Rm){
      $this->emit('cariDataPasien',$no_Rm);
    }

}
