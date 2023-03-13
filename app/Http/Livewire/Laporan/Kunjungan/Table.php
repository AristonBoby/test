<?php

namespace App\Http\Livewire\Laporan\Kunjungan;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
class Table extends Component
{
    public $tanggalmulai ;
    public $tanggalselesai;
    protected $laporanpasien ;
    public $listeners = ['laporanKunjungan'=>'cariLaporan'];
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function updatingTanggalmulai()
    {
        $this->resetPage();
    }

    public function render()
    {
        $pasien = DB::table('kunjungans')
            ->join('jaminans','kunjungans.id_jaminan','jaminans.id_jaminan')
            ->join('pasiens','kunjungans.id_pasien','pasiens.id')
            ->join('polis','kunjungans.id_poli','polis.id_poli')
            ->join('kelurahans','pasiens.kel_id','kelurahans.id_kel')
            ->join('kecamatans','kelurahans.kec_id','kecamatans.id_kec')
            ->join('kotas','kecamatans.kota_id','kotas.kota_id')
            ->select('kunjungans.id',
                     'pasiens.no_Rm',
                     'pasiens.nama',
                     'pasiens.tanggal_Lahir',
                     'pasiens.alamat',
                     'pasiens.jenkel',
                     'pasiens.nik',
                     'pasiens.bpjs',
                     'polis.nama_poli',
                     'jaminans.jaminan',
                     'tanggal',
                     'pasiens.no_tlpn',
                     'kelurahans.kel_name',
                     'kecamatans.kec_name',
                     'kotas.kota_name',
                     )
            ->whereBetween('tanggal',[$this->tanggalmulai,$this->tanggalselesai])
            ->orderBy('tanggal','asc')
            ->paginate(20,['*'],'pasien');
            $this->laporanpasien = $pasien;
        return view('livewire.laporan.kunjungan.table',['varLaporanPasien' => $this->laporanpasien]);
    }

    public function cariLaporan($tanggalMulai,$tanggalSelesai)
    {
       $this->tanggalmulai      = $tanggalMulai;
       $this->tanggalselesai    = $tanggalSelesai;
    }
}
