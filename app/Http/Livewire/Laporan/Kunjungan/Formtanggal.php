<?php

namespace App\Http\Livewire\Laporan\Kunjungan;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Formtanggal extends Component
{   protected $listeners=['tanggalLaporanMulai','tanggalLaporanSampai'];
    public $tanggalMulai;
    public $tanggalSampai;
    use WithPagination;

    public function tanggalLaporanMulai($tglMulai)
    {
        $this->tanggalMulai = $tglMulai;
    }

    public function tanggalLaporanSampai($tglSampai)
    {
        $this->tanggalSampai= $tglSampai;
    }

    public function render()
    {
        return view('livewire.laporan.kunjungan.formtanggal');
    }

    public function mount(){
        $this->tanggalMulai = date('d-m-Y');
        $this->tanggalSampai = date('d-m-Y');
    }

    public function store()
    {   $this->resetPage();
        $tanggalMulai = \Carbon\Carbon::parse($this->tanggalMulai)->format('Y-m-d');
        $tanggalSampai = \Carbon\Carbon::parse($this->tanggalSampai)->format('Y-m-d');
        $this->emit('laporanKunjungan',$tanggalMulai, $tanggalSampai);
    }

}
