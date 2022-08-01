<?php
namespace App\Http\Livewire\Pendaftaran\Pasien;

use Livewire\Component;
use App\Models\pasien;
use Carbon\Carbon;
use PDF;
class Cetak extends Component
{
    public function cetak ($id)
    {
        $que = pasien::where('no_Rm',$id)->first();
        $s = Carbon::parse('2022-01-01')->translatedFormat('d F Y');
        $date=carbon::now()->isoFormat('dddd, D MMMM Y');

        $data = PDF::loadview('cetak');
        //mendownload laporan.pdf
    	return $data->download($que->no_Rm.$que->nama.'.pdf');
    }
}
