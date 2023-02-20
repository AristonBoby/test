<?php

namespace App\Http\Livewire\Pendaftaran\Ptm\Dataptm;

use App\Models\pasien;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
class TablePtm extends Component
{
    public $caridata='';
    public $skrining=[
        'riwayatKeluarga1'  =>  '',
        'riwayatKeluarga2'  =>  '',
        'riwayatKeluarga3'  =>  '',
        'riwayatSendiri1'   =>  '',
        'riwayatSendiri2'   =>  '',
        'riwayatSendiri3'   =>  '',
        'merokok'           =>  '',
        'aktifitasFisik'    =>  '',
        'gula'              =>  '',
        'garam'             =>  '',
        'lemak'             =>  '',
        'sayur'             =>  '',
        'alkohol'           =>  '',
        'diagnosis1'        =>  '',
        'diagnosis2'        =>  '',
        'diagnosis3'        =>  '',
        'terapiFarmakologi' =>  '',
        'konseling'         =>  '',
        'hasilIva'          =>  '',
        'tindakLanjutIva'   =>  '',
        'hasilSadanis'      =>  '',
        'tidakLanjutSadanis'=>  '',
        'konselingUbm'      =>  '',
        'car'               =>  '',
        'ubm'               =>  '',
        'kondisi'           =>  '',
    ];
    public $varIdSkrining;
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
        $this->varIdSkrining = $id;
    }

    public function riwayatPenyakit()
    {   $id = pasien::findOrFail($this->varIdSkrining);
        if(!empty($id))
        {
            dd($this->skrining);
        }       
    }
}
