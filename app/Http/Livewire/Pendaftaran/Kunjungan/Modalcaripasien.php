<?php

namespace App\Http\Livewire\Pendaftaran\Kunjungan;
use App\Models\pasien;
use Livewire\Component;

class Modalcaripasien extends Component
{
    public $cari=""; 
    
    public function render()
    {
        return view('livewire.pendaftaran.kunjungan.modalcaripasien',  [   
            'query' => pasien::where('no_Rm', $this->cari)
                       ->orwhere('nama','Like','%'.$this->cari.'%')
                       ->orwhere('nik','LIKE','%'.$this->cari.'%')
                       ->orwhere('bpjs','LIKE','%'.$this->cari.'%')->orderby('created_at','desc')->paginate(10)


        ]);
    }
    public function hapuscari()
    {
        $this->cari = "";
    }

}
