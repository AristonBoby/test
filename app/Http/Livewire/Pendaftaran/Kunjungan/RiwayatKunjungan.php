<?php

namespace App\Http\Livewire\Pendaftaran\Kunjungan;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RiwayatKunjungan extends Component
{   protected $listeners = ['riwayatKunjungan' => 'kunjungan'];
    public $riwayatKunjungan;
    public function render()
    {
        return view('livewire..pendaftaran.kunjungan.riwayat-kunjungan', [
        'riwayatKunjungan' => $this->riwayatKunjungan]);
    }

    public function kunjungan($id_pasien){
        $query = DB::table('kunjungans')->where('id_pasien',$id_pasien)->get();
        $this->riwayatKunjungan = $query;
    }
}
