<?php

namespace App\Http\Livewire\Pendaftaran\Ptm;



use Livewire\Component;
use App\Models\pasien;
use App\Models\pasienPtm;

use Illuminate\Support\Facades\DB;
class FormCari extends Component
{   public $cari;
    public $form;
    public $kelurahan;
    public $prov;
    public $provinsi;
    public $kotas;
    public $cities = [
        'Rajkot',
        'Surat',
        'Baroda',
    ]; 


    public function render()
    {

        return view('livewire.pendaftaran.ptm.form-cari');
    }

    protected $rules=([
        'cari' => 'required',
    ]);

    protected $messages = ([
        'cari.required' => 'NIK Tidak Boleh Kosong'
    ]);

    public function cek_ptm()
    {
        $this->validate();
        $ptm = pasienPtm::where('nik',$this->cari)->first();
        if(!null==$ptm){
            $this->ptmCek($id);
        }else{
            $this->pasienCek($this->cari);
        }

    }

    private function ptmCek ($id)
    {   
        $this->emit('ptmData');
        
    }

    private function pasienCek($id)
    {
        $id = DB::table('pasiens')
            ->join('kelurahans','pasiens.kel_id','kelurahans.id_kel')
            ->join('kecamatans','kelurahans.kec_id','kecamatans.id_kec')
            ->join('kotas','kecamatans.kota_id','kotas.kota_id')
            ->join('provinsis','kotas.prov_id','provinsis.prov_id')
            ->select(['pasiens.*','kelurahans.kel_name','kecamatans.id_kec','kecamatans.kec_name','kotas.kota_id','kotas.kota_name','provinsis.prov_id','provinsis.prov_name'])
            ->where('nik',$id)->first();
        if(!null==$id)
        {      
                
                $this->emit('ptmData',$id);
        }
        else{
            $this->emit('ptmData',$id);
        }
    }
}
