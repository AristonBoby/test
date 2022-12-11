<?php

namespace App\Http\Livewire\Laporan;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Laporankunjungan extends Component
{   public $mulaitanggal;
    public $sampaitanggal;
    public $laporanpoli;
    protected $listeners = ['ubahData'=>'updateData'];
    
    public function render()
    {
        return view('livewire.Laporan.laporankunjungan');
    }

    public function mount(){
        $this->mulaitanggal = Date('Y-m-d');
        $this->sampaitanggal = Date('Y-m-d');
        $laporanpoli = DB::table('kunjungans')
                    ->join('polis','kunjungans.id_poli','polis.id_poli')
                    ->selectRaw('count(kunjungans.id_poli)as jumlah, polis.nama_poli')
                    ->groupBy('polis.nama_poli')
                    ->orderBy('jumlah','desc')
                    ->whereBetween('kunjungans.tanggal',[$this->mulaitanggal,$this->sampaitanggal])->paginate(10);
        $this->laporanpoli = json_encode($laporanpoli);
    }

    public function updateData(){
        $laporanpoli= DB::table('kunjungans')
                    ->join('polis','kunjungans.id_poli','polis.id_poli')
                    ->selectRaw('count(kunjungans.id_poli)as jumlah, polis.nama_poli')
                    ->groupBy('polis.nama_poli')
                    ->orderBy('jumlah','desc')
                    ->whereBetween('kunjungans.tanggal',[$this->mulaitanggal,$this->sampaitanggal])->paginate(10);
        $this->laporanpoli = json_encode($laporanpoli);
    }
}
