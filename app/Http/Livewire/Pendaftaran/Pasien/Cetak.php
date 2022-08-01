<?php
namespace App\Http\Livewire\Pendaftaran\Pasien;

use Livewire\Component;
use App\Models\pasien;
use Carbon\Carbon;
class Cetak extends Component
{
    public function cetak ($id)
    {
        $que = pasien::where('no_Rm',$id)->first();
        $s=carbon::now($que->tanggal_lahir)->isoFormat('dddd, D MMMM Y');
        $date=carbon::now()->isoFormat('dddd, D MMMM Y');
        return view('cetakPasien', [
        'data' => pasien::where('no_Rm',$id)->get(),
        'tgl_Lahir'=>$s,
        'date'=>$date
                ]);
    }
}
