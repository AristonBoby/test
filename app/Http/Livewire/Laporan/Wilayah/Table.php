<?php

namespace App\Http\Livewire\Laporan\Wilayah;
use Livewire\WithPagination;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
class Table extends Component
{   use WithPagination;
    public $wilayahPasien;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {   $wilayahPasien = DB::table('pasiens')
                         ->join('kelurahans','pasiens.kel_id','kelurahans.id_kel')
                         ->join('kecamatans','kelurahans.kec_id','kecamatans.id_kec')
                         ->join('kotas','kecamatans.kota_id','kotas.kota_id')
                         ->join('provinsis','kotas.prov_id','provinsis.prov_id')
                         ->select('kelurahans.kel_name','kecamatans.kec_name','kotas.kota_name','provinsis.prov_name')
                         ->selectRaw('count(pasiens.kel_id) as jumlah')
                         ->groupBy('pasiens.kel_id')->orderBy('jumlah','desc')->paginate(20);
        //dd($wilayahPasien);
        return view('livewire.laporan.wilayah.table',[
            'jumlah' => $wilayahPasien,
        ]);
    }
}
