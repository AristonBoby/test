<?php

namespace App\Http\Livewire\Pendaftaran\Kunjungan;
use App\Models\pasien;
use Livewire\Component;

class Modalcaripasien extends Component
{
    public $cari=""; 
    public $query;
    public function render()
    {
        return view('livewire.pendaftaran.kunjungan.modalcaripasien',  [   
            'query' => $this->query
        ]);
    }
    public function hapuscari()
    {
        $this->cari = "";
    }

    public function cariData(){
    $data = pasien::where('no_Rm', $this->cari)
                       ->orwhere('nama','Like','%'.$this->cari.'%')
                       ->orwhere('nik','LIKE','%'.$this->cari.'%')
                       ->orwhere('bpjs','LIKE','%'.$this->cari.'%')->orderby('created_at','desc')->get();
    if($data)
    {
        $this->query = $data;
    }

    }
    public function cariPasien($no_Rm){
      $this->emit('cariDataPasien',$no_Rm);
    } 

}
