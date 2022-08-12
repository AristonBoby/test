<?php
namespace App\Http\Livewire\Pendaftaran\Pasien;

use Livewire\Component;
use App\Models\pasien;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
class Cetak extends Component
{
    public function cetak ($id)
    {
        $que = DB::table('pasiens')
        ->join('kelurahans','pasiens.kel_id','kelurahans.id_kel')
        ->join('kecamatans','kelurahans.kec_id','kecamatans.id_kec')
        ->join('kotas','kecamatans.kota_id','kotas.kota_id')
        ->join('provinsis','kotas.prov_id','provinsis.prov_id')
        ->select('*','kelurahans.kel_name','kecamatans.kec_name','kotas.kota_name','provinsis.prov_name')
        ->where('pasiens.no_Rm',$id)->first();
        if($que)
        {
            $s = Carbon::parse($que->tanggal_Lahir)->translatedFormat('d F Y');
            $date=carbon::now()->isoFormat('dddd, D MMMM Y');
            $data = PDF::loadView('cetak',['data'=>$que,'tgl_lahir'=>$s,'date'=>$date]);
            $kertas = array(0,0,360,360);
            //mendownload laporan.pdf
    	    $data->set_paper($kertas);
            $data->stream('hghg.pdf');
            return $data->stream();
        }
    }
}
