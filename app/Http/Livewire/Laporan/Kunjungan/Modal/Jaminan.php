<?php

namespace App\Http\Livewire\Laporan\Kunjungan\Modal;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
class Jaminan extends Component
{   protected $listeners = ['modalPasienJaminan'];
    public $tanggalMulai;
    public $tanggalSelesai;
    public $data;
    public $cari ='';
    protected $paginationTheme = 'bootstrap';
    use WithPagination;

    public function updatingCari()
    {
        $this->resetPage('jaminan');
    }

    public function updatingData()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = DB::table('jaminans')
                    ->join('kunjungans','jaminans.id_jaminan','kunjungans.id_jaminan')
                    ->join('polis','kunjungans.id_poli','polis.id_poli')
                    ->join('pasiens','kunjungans.id_pasien','pasiens.id')
                    ->join('kelurahans','pasiens.kel_id','kelurahans.id_kel')
                    ->join('kecamatans','kelurahans.kec_id','kecamatans.id_kec')
                    ->join('kotas','kecamatans.kota_id','kotas.kota_id')
                    ->select('jaminans.jaminan',
                            'pasiens.nama',
                            'tempat_Lahir',
                            'tanggal',
                            'no_Rm',
                            'tanggal_Lahir',
                            'jenkel',
                            'agama',
                            'pekerjaan',
                            'nik',
                            'alamat',
                            'kel_name',
                            'kec_name',
                            'kota_name',
                            'jaminan',
                            'nama_poli'
                            )
                    ->where('jaminans.id_jaminan',$this->data)
                    ->where('nama', 'like', '%' .$this->cari. '%')
                    ->whereBetween('tanggal',[$this->tanggalMulai,$this->tanggalSelesai])
                    ->paginate(10,['*'],'jaminan');
        return view('livewire.laporan.kunjungan.modal.jaminan',[
            'query' => $query
        ]);
    }
    public function modalPasienJaminan($data,$tanggalMulai,$tanggalSelesai)
    {   $this->tanggalMulai     = $tanggalMulai;
        $this->tanggalSelesai   = $tanggalSelesai;
        $this->data             = $data;
        $this->cari             = '';
        $this->resetPage('jaminan');
    }
}
