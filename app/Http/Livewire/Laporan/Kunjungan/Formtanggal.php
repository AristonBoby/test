<?php

namespace App\Http\Livewire\Laporan\Kunjungan;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use PDF;
class Formtanggal extends Component
{
    public $tanggalMulai;
    public $tanggalSampai;
    public function render()
    {
        $tanggalMulai = $this->tanggalMulai;
        $tanggalSampai = $this->tanggalSampai;

        return view('livewire.laporan.kunjungan.formtanggal',[
            'tanggalMulai' =>$tanggalMulai,
            'tanggalSampai'=>$tanggalSampai,
        ]);
    }
    public function mount(){
        $this->tanggalMulai;
        $this->tanggalSampai;
    }

    public function store()
    {
        $this->emit('laporanKunjungan',$this->tanggalMulai, $this->tanggalSampai);
    }

    public function cetakKunjungan()
    {  
        $pdf = \PDF::loadHTML('contact')->setOptions(['defaultFont' => 'sans-serif']); 
        
        return $pdf->download('invoice.pdf');
    }
    
    
}
        // $dompdf->save('myfile.pdf');
        // $dompdf->render();   
        //$dompdf->stream('Laporan_Kunjungan.pdf'); 