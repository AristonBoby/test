<?php

namespace App\Http\Livewire\Pendaftaran\Ptm\Dataptm;

use App\Models\pasien;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\skriningPtm;
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

    public function resetVar()
    {   $skrining = [
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
        'dm'           =>  '',
        'ht'           =>  '',
        ];
    }
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
                        'ht',
                        )
                ->where('nama', 'like', '%' .$this->caridata. '%')
                ->orWhere('nik','like', '%' .$this->caridata. '%')
                ->orderBy('pasiens.no_Rm','asc')
                ->paginate(10),
        ]);
    }
    public function updateIdPasien($id)
    {
        $this->varIdSkrining = $id;
        $skrining = skriningPtm::where('id_pasien',$this->varIdSkrining)->first();
        if(empty($skrining))
        {
            $id = pasien::where('id',$this->varIdSkrining)->first();
                $id->update([
                    'skrining' => 0,
                ]);

        }
    }

    public function idPasien($id)
    {
        $this->varIdSkrining = $id;
        $skrining = skriningPtm::where('id_pasien',$this->varIdSkrining)->first();
        if(empty($skrining))
        {
            $id = pasien::where('id',$this->varIdSkrining)->first();
                $id->update([
                    'skrining' => 0,
                ]);

        }
    }

    public function riwayatPenyakit()
    {   $id = pasien::findOrFail($this->varIdSkrining);
        $skrining = skriningPtm::where('id_pasien',$this->varIdSkrining)->first();

        if( !empty($id) && empty($skrining) )
        {
           $createSkrining = skriningPtm::create([
                'id_pasien'         => $this->varIdSkrining,
                'riwayatKeluarga1'  => $this->skrining['riwayatKeluarga1'],
                'riwayatKeluarga2'  => $this->skrining['riwayatKeluarga2'],
                'riwayatKeluarga3'  => $this->skrining['riwayatKeluarga3'],
                'riwayatSendiri1'   => $this->skrining['riwayatSendiri1'],
                'riwayatSendiri2'   => $this->skrining['riwayatSendiri2'],
                'riwayatSendiri3'   => $this->skrining['riwayatSendiri3'],
                'merokok'           => $this->skrining['merokok'],
                'aktifitasFisik'    => $this->skrining['aktifitasFisik'],
                'gula'              => $this->skrining['gula'],
                'garam'             => $this->skrining['garam'],
                'lemak'             => $this->skrining['lemak'],
                'sayur'             => $this->skrining['sayur'],
                'alkohol'           => $this->skrining['alkohol'],
                'diagnosis1'        => $this->skrining['diagnosis1'],
                'diagnosis2'        => $this->skrining['diagnosis2'],
                'diagnosis3'        => $this->skrining['diagnosis3'],
                'terapiFarmakologi' => $this->skrining['terapiFarmakologi'],
                'konseling'         => $this->skrining['konseling'],
                'hasilIva'          => $this->skrining['hasilIva'],
                'tindakLanjutIva'   => $this->skrining['tindakLanjutIva'],
                'hasilSadanis'      => $this->skrining['hasilSadanis'],
                'tidakLanjutSadanis'=> $this->skrining['tidakLanjutSadanis'],
                'konselingUbm'      => $this->skrining['konselingUbm'],
                'car'               => $this->skrining['car'],
                'ubm'               => $this->skrining['ubm'],
                'kondisi'           => $this->skrining['kondisi'],
           ]);

           if($createSkrining)
           {
                $id = pasien::where('id',$this->varIdSkrining)->first();
                $id->update([
                    'skrining' => 1,
                    'ht'       => $this->skrining['ht'],
                    'dm'        => $this->skrining['dm'],
                ]);

                if($id)
                {
                    $this->render();
                    $this->resetVar();
                    $this->dispatchBrowserEvent('closeModalSimpan');
                    $this->dispatchBrowserEvent('alert',['title'=>'Berhasil Disimpan','icon'=>'success','text'=>'Skrining Pasien Berhasil di Simpan','timer'=>2000]);

                }
           }

        }
    }
}
