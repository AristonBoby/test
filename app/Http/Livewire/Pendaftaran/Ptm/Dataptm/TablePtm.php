<?php

namespace App\Http\Livewire\Pendaftaran\Ptm\Dataptm;

use App\Models\pasien;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use App\Models\skriningPtm;
class TablePtm extends Component
{
    public $caridata              =  '';
    public $dataRiwayatKeluarga1  =  '';
    public $dataRiwayatKeluarga2  =  '';
    public $dataRiwayatKeluarga3  =  '';
    public $dataRiwayatSendiri1   =  '';
    public $dataRiwayatSendiri2   =  '';
    public $dataRiwayatSendiri3   =  '';
    public $dataMerokok           =  '';
    public $dataAktifitasFisik    =  '';
    public $dataGula              =  '';
    public $dataGaram             =  '';
    public $dataLemak             =  '';
    public $dataSayur             =  '';
    public $dataAlkohol           =  '';
    public $dataDiagnosis1        =  '';
    public $dataDiagnosis2        =  '';
    public $dataDiagnosis3        =  '';
    public $dataTerapiFarmakologi =  '';
    public $dataKonseling         =  '';
    public $dataHasilIva          =  '';
    public $dataTindakLanjutIva   =  '';
    public $dataHasilSadanis      =  '';
    public $dataTidakLanjutSadanis=  '';
    public $dataKonselingUbm      =  '';
    public $dataCar               =  '';
    public $dataUbm               =  '';
    public $dataKondisi           =  '';
    public $dataDm                =  '';
    public $updateSkrining        =  '';
    public $dataRm                =  '';
    public $idDelete              =  '';
    public $dataViewPasien;
    public $varIdSkrining;
    protected $paginationTheme = 'bootstrap';
    use WithPagination;



    public function resetVar()
    {
        $this->dataRiwayatKeluarga1 = '';
        $this->dataRiwayatKeluarga2= '';
        $this->dataRiwayatKeluarga3= '';
        $this->dataRiwayatSendiri1= '';
        $this->dataRiwayatSendiri2= '';
        $this->dataRiwayatSendiri3= '';
        $this->dataMerokok= '';
        $this->dataAktifitasFisik= '';
        $this->dataGula= '';
        $this->dataGaram= '';
        $this->dataLemak= '';
        $this->dataSayur= '';
        $this->dataAlkohol= '';
        $this->dataDiagnosis1= '';
        $this->dataDiagnosis2= '';
        $this->dataDiagnosis3= '';
        $this->dataTerapiFarmakologi= '';
        $this->dataKonseling= '';
        $this->dataHasilIva= '';
        $this->dataTindakLanjutIva= '';
        $this->dataHasilSadanis= '';
        $this->dataTidakLanjutSadanis= '';
        $this->dataKonselingUbm= '';
        $this->dataCar= '';
        $this->dataUbm= '';
        $this->dataKondisi= '';
        $this->dataHt ='';
        $this->dataDm='';
    }

    public function render()
    {
        $dat = DB::table('pasiens')
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
                'agama',
                'nik',
                'pekerjaan',
                'kecamatans.kec_name',
                'kotas.kota_name',
                'bpjs',
                'users.name',
                'pasiens.alamat',
                'kelurahans.kel_name',
                'kecamatans.kec_name',
                'kotas.kota_name',
                'status',
                'skrining',
                'dm',
                'ht',
                )
        ->where('pasiens.nama', 'like', '%' .$this->caridata. '%')
        ->orWhere('pasiens.nik','like', '%' .$this->caridata. '%')
        ->orderBy('pasiens.no_Rm','asc')
        ->paginate(10);
        return view('livewire..pendaftaran.ptm.dataptm.table-ptm', [
             'pasien'=> $dat,
        ]);
    }
    public function viewPasien($id){
        $data = DB::table('pasiens')
                ->join('skriningptms','pasiens.id','skriningptms.id_pasien')
                ->join('kelurahans','pasiens.kel_id','kelurahans.id_kel')
                ->join('kecamatans','kelurahans.kec_id','kecamatans.id_kec')
                ->join('kotas','kecamatans.kota_id','kotas.kota_id')
                ->join('users','pasiens.id_user','users.id')
                ->where('pasiens.id',$id)
                ->get();
        $this->dataViewPasien = $data;
    }

    public function updateIdPasien($id)
    {   $this->resetVar();
        $this->varIdSkrining = $id;
        $skrining = skriningPtm::where('id_pasien',$this->varIdSkrining)->first();
        $this->updateSkrining = $skrining;

        if(empty($skrining))
        {
            $id = pasien::where('id',$this->varIdSkrining)->first();
                $id->update([
                    'skrining' => 0,
                ]);
        }
        elseif(!empty($skrining))
        {   $this->resetVar();
            $data = DB::table('pasiens')
                    ->join('skriningptms','pasiens.id','skriningptms.id_pasien')
                    ->where('pasiens.id',$this->varIdSkrining)->first();
                    $this->varIdSkrining            = $data->id;
                    $this->dataRiwayatKeluarga1     = $data->riwayatKeluarga1;
                    $this->dataRiwayatKeluarga2     = $data->riwayatKeluarga2;
                    $this->dataRiwayatKeluarga3     = $data->riwayatKeluarga3;
                    $this->dataRiwayatSendiri1      = $data->riwayatSendiri1;
                    $this->dataRiwayatSendiri2      = $data->riwayatSendiri2;
                    $this->dataRiwayatSendiri3      = $data->riwayatSendiri3;
                    $this->dataMerokok              = $data->merokok;
                    $this->dataAktifitasFisik       = $data->aktifitasFisik;
                    $this->dataGula                 = $data->gula;
                    $this->dataGaram                = $data->garam;
                    $this->dataLemak                = $data->lemak;
                    $this->dataSayur                = $data->sayur;
                    $this->dataAlkohol              = $data->alkohol;
                    $this->dataDiagnosis1           = $data->diagnosis1;
                    $this->dataDiagnosis2           = $data->diagnosis2;
                    $this->dataDiagnosis3           = $data->diagnosis3;
                    $this->dataTerapiFarmakologi    = $data->terapiFarmakologi;
                    $this->dataKonseling            = $data->konseling;
                    $this->dataHasilIva             = $data->hasilIva;
                    $this->dataTindakLanjutIva      = $data->tindakLanjutIva;
                    $this->dataHasilSadanis         = $data->hasilSadanis;
                    $this->dataTidakLanjutSadanis   = $data->tidakLanjutSadanis;
                    $this->dataKonselingUbm         = $data->konselingUbm;
                    $this->dataCar                  = $data->car;
                    $this->dataUbm                  = $data->ubm;
                    $this->dataKondisi              = $data->kondisi;
                    $this->dataHt                   = $data->ht;
                    $this->dataDm                   = $data->dm;
            //dd($this->updateSkrining);
            //$this->updateSkrining = pasien::where('id',$this->varIdSkrining)->first();
        }
    }

    public function idPasien($id)
    {   $this->resetVar();
        $this->varIdSkrining = $id;
        $skrining = skriningPtm::where('id_pasien',$this->varIdSkrining)->first();
        if(empty($skrining))
        {
            $id = pasien::where('id',$this->varIdSkrining)->first();
                $id->update([
                    'skrining' => 0,
                ]);
        }
        elseif(!empty($skrining))
        {
            $id = pasien::where('id',$this->varIdSkrining)->first();
                $id->update([
                    'skrining' => 1,
                ]);
        }
    }

    public function riwayatPenyakit()
    {   $id = pasien::findOrFail($this->varIdSkrining);
        $skrining = skriningPtm::where('id_pasien',$this->varIdSkrining)->first();
        if(!empty($id) && empty($skrining))
        {
           $createSkrining = skriningPtm::create([
                'id_pasien'         => $this->varIdSkrining,
                'riwayatKeluarga1'  => $this->dataRiwayatKeluarga1,
                'riwayatKeluarga2'  => $this->dataRiwayatKeluarga2,
                'riwayatKeluarga3'  => $this->dataRiwayatKeluarga3,
                'riwayatSendiri1'   => $this->dataRiwayatSendiri1,
                'riwayatSendiri2'   => $this->dataRiwayatSendiri2,
                'riwayatSendiri3'   => $this->dataRiwayatSendiri3,
                'merokok'           => $this->dataMerokok,
                'aktifitasFisik'    => $this->dataAktifitasFisik,
                'gula'              => $this->dataGula,
                'garam'             => $this->dataGaram,
                'lemak'             => $this->dataLemak,
                'sayur'             => $this->dataSayur,
                'alkohol'           => $this->dataAlkohol,
                'diagnosis1'        => $this->dataDiagnosis1,
                'diagnosis2'        => $this->dataDiagnosis2,
                'diagnosis3'        => $this->dataDiagnosis3,
                'terapiFarmakologi' => $this->dataTerapiFarmakologi,
                'konseling'         => $this->dataKonseling,
                'hasilIva'          => $this->dataHasilIva,
                'tindakLanjutIva'   => $this->dataTindakLanjutIva,
                'hasilSadanis'      => $this->dataHasilSadanis,
                'tidakLanjutSadanis'=> $this->dataTidakLanjutSadanis,
                'konselingUbm'      => $this->dataKonselingUbm,
                'car'               => $this->dataCar,
                'ubm'               => $this->dataUbm,
                'kondisi'           => $this->dataKondisi,
           ]);

           if($createSkrining)
           {
                $id = pasien::where('id',$this->varIdSkrining)->first();
                $id->update([
                    'skrining' => 1,
                    'ht'       => $this->dataHt,
                    'dm'       => $this->dataDm,
                ]);
                if($id)
                {
                    $this->render();
                    $this->resetVar();
                    $this->dispatchBrowserEvent('closeModalSimpan');
                    $this->dispatchBrowserEvent('alert',['title'=>'Berhasil','icon'=>'success','text'=>'Skrining Pasien Berhasil di Simpan','timer'=>2000]);

                }
           }

        }
    }

    public function updateRiwayat()
    {
          $updateSkrining = skriningPtm::find($this->varIdSkrining);
          $updatePasien   = pasien::find($this->updateSkrining['id_pasien']);
          $updatePasien->update(['dm'=> $this->dataDm,
                                 'ht'=> $this->dataHt,
                                ]);
          $updateSkrining->update([
                'riwayatKeluarga1'  => $this->dataRiwayatKeluarga1,
                'riwayatKeluarga2'  => $this->dataRiwayatKeluarga2,
                'riwayatKeluarga3'  => $this->dataRiwayatKeluarga3,
                'riwayatSendiri1'   => $this->dataRiwayatSendiri1,
                'riwayatSendiri2'   => $this->dataRiwayatSendiri2,
                'riwayatSendiri3'   => $this->dataRiwayatSendiri3,
                'merokok'           => $this->dataMerokok,
                'aktifitasFisik'    => $this->dataAktifitasFisik,
                'gula'              => $this->dataGula,
                'garam'             => $this->dataGaram,
                'lemak'             => $this->dataLemak,
                'sayur'             => $this->dataSayur,
                'alkohol'           => $this->dataAlkohol,
                'diagnosis1'        => $this->dataDiagnosis1,
                'diagnosis2'        => $this->dataDiagnosis2,
                'diagnosis3'        => $this->dataDiagnosis3,
                'terapiFarmakologi' => $this->dataTerapiFarmakologi,
                'konseling'         => $this->dataKonseling,
                'hasilIva'          => $this->dataHasilIva,
                'tindakLanjutIva'   => $this->dataTindakLanjutIva,
                'hasilSadanis'      => $this->dataHasilSadanis,
                'tidakLanjutSadanis'=> $this->dataTidakLanjutSadanis,
                'konselingUbm'      => $this->dataKonselingUbm,
                'car'               => $this->dataCar,
                'ubm'               => $this->dataUbm,
                'kondisi'           => $this->dataKondisi,
           ]);

        if($updateSkrining && $updatePasien)
        {   $this->dispatchBrowserEvent('closeModalEdit');
            $this->dispatchBrowserEvent('alert',['title'=>'Berhasil','text'=>'Data Berhasil Tersimpan','icon'=>'success','timer'=>3000]);
        }
    }

    public function deleteId($id)
    {
       $this->idDelete = $id;
    }

    public function deleteSkrining()
    {   $this->dispatchBrowserEvent('deleteSkrining');
        $delete = skriningPtm::where('id_pasien',$this->idDelete)->delete();
        if($delete)
        {   $pasien = pasien::find($this->idDelete)->update([
                'skrining' => 0,
                'dm'       => 0,
                'ht'       => 0,
            ]);
            if($pasien)
            {
                $this->idDelete = '';
                $this->dispatchBrowserEvent('alert',['title'=>'Berhasil','text'=>'Data Berhasil Di Hapus','icon'=>'success','timer'=>3000]);
                $this->dispatchBrowserEvent('closeDeleteSkrining');
            }

        }
    }
}
