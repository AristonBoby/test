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
        $s = Carbon::parse($que->tanggal_Lahir)->translatedFormat('d F Y');
        $date=carbon::now()->isoFormat('dddd, D MMMM Y');

        $data = PDF::loadView('cetak',['data'=>$que,'tgl_lahir'=>$s,'date'=>$date]);
        $kertas = array(0,0,595.4,935.5);
        //mendownload laporan.pdf
    	    $data->set_paper($kertas);
            $data->stream('hghg.pdf');
            return $data->stream();
    }
}
