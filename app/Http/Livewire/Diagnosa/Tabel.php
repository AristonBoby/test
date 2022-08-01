<?php

namespace App\Http\Livewire\Diagnosa;

use Livewire\Component;
use App\Models\kunjungan;
use App\Models\diagnosa;
use Illuminate\Support\Facades\DB;
class Tabel extends Component
{
    public $tanggal;
    public $pasiendiagnosa;
    public function render()
    {
        return view('livewire.diagnosa.tabel');
       
    }
    public function mount()
    {
        $this->tanggal = date('Y-m-d');
        $this->pasiendiagnosa;
    }

    public function pasienDiagnosa(){
        //$data = kunjungan::where('id_pasien','3')->groupBy('id_pasien')->orderBy('tanggal')->get();
        $data= DB::table('kunjungans')
                ->join('diagnosas','kunjungans.id','diagnosas.id_kunjungan')
                ->join('dokters','diagnosas.id_dokter','dokters.id_dok')
                ->join('icd10','diagnosas.id_icd','=','icd10.icd_code')
                ->join('pasiens','kunjungans.id_pasien','pasiens.id')
                ->join('polis','kunjungans.id_poli','polis.id_poli')
                ->whereBetween('kunjungans.tanggal',['2022-07-01','2022-07-31'])
                ->select('diagnosas.id_diag',DB::raw('group_concat(diagnosas.id_icd)as icd'),DB::raw('group_concat(icd10.diagnosa)as diagnosa')
                        ,'pasiens.nama' 
                        ,'pasiens.no_Rm'
                        ,'pasiens.tanggal_Lahir'
                        ,'polis.nama_poli'
                        ,'pasiens.jenkel'
                        ,'kunjungans.tanggal as tgl_kunjungan'
                        ,'dokters.nama as dokter'
                        ,'dokters.nama as nama_dokter'
                        )
                ->groupby('pasiens.id','dokters.nama')->get();
                
            if($data)
            {
                $this->pasiendiagnosa = $data;
                json_decode($this->pasiendiagnosa);
            }
    }

    public function city($id)
    {
        $this->emit('city_change', ['city' => $id] );
    }
}
