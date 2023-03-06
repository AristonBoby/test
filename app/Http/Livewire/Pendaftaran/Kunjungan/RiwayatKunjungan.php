<?php

namespace App\Http\Livewire\Pendaftaran\Kunjungan;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class RiwayatKunjungan extends Component
{   use WithPagination;
    protected $listeners = ['riwayatKunjungan' => 'kunjungan'];
    protected $paginationTheme = 'bootstrap';
    public $riwayatKunjungan;
    public $idKunjungan;

    public function updatingRiwayatKunjungan()
    {
        $this->resetPage('commentsPage');
    }
    public function render()
    {    $query = DB::table('kunjungans')
            ->join('jaminans','kunjungans.id_jaminan','jaminans.id_jaminan')
            ->join('polis','kunjungans.id_poli','polis.id_poli')
            ->where('id_pasien',$this->riwayatKunjungan)->orderBy('tanggal','desc')
            ->paginate(5, ['*'], 'commentsPage');
        return view('livewire..pendaftaran.kunjungan.riwayat-kunjungan', [
        'riwayat' => $query]);
    }

    public function kunjungan($id_pasien){
        $this->riwayatKunjungan = $id_pasien;
    }

    public function idHapus($id)
    {
        $this->idKunjungan = $id;
    }

    public function hapusRiwayat()
    {
        $query = DB::table('kunjungans')->where('id',$this->idKunjungan)->delete();

        if($query)
        {
            $this->dispatchBrowserEvent('alert',['title'=>'Berhasil','icon'=>'success','text'=>'Data Kunjungan Berhasil Dihapus']);
            $this->dispatchBrowserEvent('closeModalDelate');

        }


    }

}
