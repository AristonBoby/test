<?php

namespace App\Http\Livewire\Laporan\Daftarpasien;

use Livewire\Component;
use \Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
class Tabel extends Component
{   public $listeners = ['laporanPasien'=>'cariLaporan'];
    public $query;
    public $pasien;
    public $tglmulai;
    public $tglselesai;
    use WithPagination;

    public function render()
    {
        $jumlah = DB::table('pasiens')
        ->join('users','pasiens.id_user','users.id')
        ->selectRaw('count(pasiens.id_user) as jumlah , users.name')
        ->where('users.role',1)
        ->whereBetween('pasiens.created_at',[$this->tglmulai,$this->tglselesai])
        ->groupBy('users.name')->orderBy('jumlah','desc')->paginate(10);

        return view('livewire.laporan.daftarpasien.tabel',[
            'jumlah'=> $jumlah,
        ]);
    }

    public function cariLaporan($tglmulai,$tglselesai)
    {
        //dd($tglselesai);
        $this->tglmulai = $tglmulai;
        $this->tglselesai = $tglselesai;
    }
}
