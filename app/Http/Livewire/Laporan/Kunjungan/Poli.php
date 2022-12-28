<?php

namespace App\Http\Livewire\Laporan\Kunjungan;
use Livewire\WithPagination;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Poli extends Component
{   public $listeners = ['laporanKunjungan'=>'cariLaporan'];
    protected $jumlah;
    protected $paginationTheme = 'bootstrap';
    use WithPagination;
    public function render()
    {
        return view('livewire.laporan.kunjungan.poli',[
            'jumlahPoli' => $this->jumlah
        ]);
    }

    public function cariLaporan($tanggalMulai,$tanggalSelesai)
    {
        $jumlahPoli = DB::table('kunjungans')
                    ->join('polis','kunjungans.id_poli','polis.id_poli')
                    ->selectRaw('count(kunjungans.id_poli) as jumlah, sum(kunjungans.id_poli) as total, polis.nama_poli')
                    ->groupBy('kunjungans.id_poli')
                    ->whereBetween('tanggal',[$tanggalMulai,$tanggalSelesai])
                    ->orderBy('jumlah','desc')->get();
        $totalPoli = DB::table('kunjungans')
                    ->whereBetween('tanggal',[$tanggalMulai,$tanggalSelesai])
                    ->count();
        $this->total = $totalPoli;
        $this->jumlah = $jumlahPoli;
    }
}
