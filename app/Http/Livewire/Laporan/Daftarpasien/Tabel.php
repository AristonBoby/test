<?php

namespace App\Http\Livewire\Laporan\Daftarpasien;

use Livewire\Component;
use \Illuminate\Support\Facades\DB;
class Tabel extends Component
{   public $listeners = ['laporanPasien'=>'cariLaporan'];
    public $query;
    public $pasien;
    public function render()
    {
        return view('livewire.laporan.daftarpasien.tabel');
    }
    public function mount()
    {   
    }

    public function cariLaporan($tglmulai, $tglselesai)
    {
        $table = DB::table('pasiens')
        ->join('users','pasiens.id_user','users.id')
        ->selectRaw('count(pasiens.id_user) as jumlah , users.name')
        ->where('users.role',1)
        ->whereBetween('pasiens.created_at',[$tglmulai,$tglselesai])
        ->groupBy('users.name')->get();
        json_encode($table);
        $this->pasien = $table;
        //dd($this->pasien);
    }
}
