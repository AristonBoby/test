<?php

namespace App\Http\Livewire\Pendaftaran\Kunjungan;

use Livewire\Component;
use App\Models\kunjungan;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
class Tabelkunjungan extends Component
{

    public $tanggal;
    public $delate;
    public $tglKunjungan;
    use WithPagination;

    protected $listeners = ['hapus' => 'hapus','tblKunjungan'=>'tblKunjungan'];
    protected $paginationTheme = 'bootstrap';

    //Reset Paginate//
    public function updatingTanggal()
    {
        $this->resetPage();
    }
    //end//
    public function tblKunjungan($id)
    {
        $this->tglKunjungan = \Carbon\Carbon::parse($id)->format('Y-m-d');
       // dd($this->tglKunjungan);
    }
    public function render()
    {   $data = DB::table('kunjungans')
                ->join('jaminans','kunjungans.id_jaminan','jaminans.id_jaminan')
                ->join('pasiens','kunjungans.id_pasien','pasiens.id')
                ->join('polis','kunjungans.id_poli','polis.id_poli')
                ->select('kunjungans.id','pasiens.no_Rm','pasiens.nama','pasiens.tanggal_Lahir','pasiens.jenkel','pasiens.nik','pasiens.bpjs','polis.nama_poli','jaminans.jaminan','tanggal','pasiens.no_tlpn')
                ->where('tanggal',$this->tglKunjungan)
                ->orderBy('kunjungans.created_at','desc')
                ->paginate(10);

        return view('livewire.pendaftaran.kunjungan.tabelkunjungan',
        [
            'query' => $data
        ]);

    }

    public function mount()
    {
        $this->tanggal = date('d-m-Y');
    }
    public function konfirmasihapus($id){
        $this->dispatchBrowserEvent('konfirmasihapus');
        $this->delete = $id;
    }

    public function hapus(){
        $q= kunjungan::where('id',$this->delete)->delete();
        if($q)
        {
            $this->dispatchBrowserEvent('berhasilhapus');
            $this->render();
        }
    }

}
