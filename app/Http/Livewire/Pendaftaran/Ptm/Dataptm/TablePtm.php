<?php

namespace App\Http\Livewire\Pendaftaran\Ptm\Dataptm;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
class TablePtm extends Component
{   
    public $caridata='';
    public function mount(){
    }
    public function render()
    {
        return view('livewire..pendaftaran.ptm.dataptm.table-ptm', [
             'pasien'=> DB::table('pasiens')
                ->join('users','pasiens.id_user','users.id')
                ->join('kelurahans','pasiens.kel_id','kelurahans.id_kel')
                ->join('kecamatans','kelurahans.kec_id','kecamatans.id_kec')
                ->join('kotas','kecamatans.kota_id','kotas.kota_id')
                ->select('pasiens.id',
                        'pasiens.no_Rm',
                        'pasiens.nama',
                        'pasiens.created_at',
                        'tanggal_Lahir',
                        'jenkel',
                        'no_tlpn',
                        'nik',
                        'kecamatans.kec_name',
                        'kotas.kota_name',
                        'bpjs',
                        'users.name',
                        'pasiens.alamat',
                        'kelurahans.kel_name',
                        'status',
                        'skrining',
                        'dm',
                        'ht'
                        )
                ->where('nama', 'like', '%' .$this->caridata. '%')
                ->orWhere('nik','like', '%' .$this->caridata. '%')
                ->orderBy('pasiens.no_Rm','asc')
                ->paginate(10),
        ]);
    }
    public function idPasien($id)
    {
        
    }

    public function riwayatPenyakit()
    {
        
    }
}
