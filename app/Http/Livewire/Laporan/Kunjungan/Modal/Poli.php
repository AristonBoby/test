<?php

namespace App\Http\Livewire\Laporan\Kunjungan\Modal;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
class Poli extends Component
{
    public $listeners = ['modalLaporanPoli'];
    public $tanggalAwal;
    public $tanggalAkhir;
    public $poli;
    public $cari;
    protected $paginationTheme = 'bootstrap';
    use WithPagination;
    public function updatingCari()
    {
        $this->resetPage('pagePoli');
    }
    public function render()
    {   $query = DB::table('jaminans')
                ->join('kunjungans','jaminans.id_jaminan','kunjungans.id_jaminan')
                ->join('polis','kunjungans.id_poli','polis.id_poli')
                ->join('pasiens','kunjungans.id_pasien','pasiens.id')
                ->select('nama','tanggal_Lahir','tempat_Lahir','jenkel','nik','alamat','no_Rm','kunjungans.tanggal','jaminan','nama_poli')
                ->where('polis.id_poli',$this->poli)
                ->where('pasiens.nama','like','%' .$this->cari. '%')
                ->whereBetween('kunjungans.tanggal',[$this->tanggalAwal,$this->tanggalAkhir])
                ->paginate(10,['*'],'pagePoli');
        return view('livewire.laporan.kunjungan.modal.poli',[
            'query' => $query
        ]);
    }

    public function modalLaporanPoli($data,$tanggalMulai, $tanggalSelesai)
    {   $this->resetPage('pagePoli');
        $this->poli             = $data;
        $this->tanggalAwal      = $tanggalMulai;
        $this->tanggalAkhir     = $tanggalSelesai;
    }
}
