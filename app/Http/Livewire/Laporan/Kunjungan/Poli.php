<?php

namespace App\Http\Livewire\Laporan\Kunjungan;
use Livewire\WithPagination;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Poli extends Component
{   public $listeners = ['laporanKunjungan'=>'cariLaporan','modalPoli'];
    public $tanggalMulai;
    public $tanggalSelesai;
    protected $jumlah;
    protected $paginationTheme = 'bootstrap';
    use WithPagination;

    public function render()
    {   $jumlahPoli = DB::table('kunjungans')
                    ->join('polis','kunjungans.id_poli','polis.id_poli')
                    ->selectRaw('count(kunjungans.id_poli) as jumlah, polis.nama_poli, polis.id_poli')
                    ->groupBy('kunjungans.id_poli')
                    ->whereBetween('tanggal',[$this->tanggalMulai,$this->tanggalSelesai])
                    ->orderBy('jumlah','desc')->paginate(5,['*'],'poli');

        $totalPoli = DB::table('kunjungans')
                    ->whereBetween('tanggal',[$this->tanggalMulai,$this->tanggalSelesai])
                    ->count();

        return view('livewire.laporan.kunjungan.poli',[
            'jumlahPoli' => $jumlahPoli,
            'total'  => $totalPoli,
        ]);
    }

    public function modalPoli($data)
    {
       $this->emit('modalLaporanPoli', $data, $this->tanggalMulai, $this->tanggalSelesai);
    }

    public function cariLaporan($tanggalMulai,$tanggalSelesai)
    {   $this->resetPage('poli');
        $this->tanggalMulai     = $tanggalMulai;
        $this->tanggalSelesai   = $tanggalSelesai;
    }
}
