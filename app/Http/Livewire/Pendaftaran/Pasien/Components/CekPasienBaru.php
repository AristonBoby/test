<?php

namespace App\Http\Livewire\Pendaftaran\Pasien\Components;

use Livewire\Component;
use App\Models\pasien;
class CekPasienBaru extends Component
{   public $nik;
    public function render()
    {
        return view('livewire.pendaftaran.pasien.components.cek-pasien-baru');
    }

    public function cekPasien ()
    {
        $query = pasien::where('nik',$this->nik)->first();

        if(empty($query->nik))
        {
           
        }

        if(!empty($query->nik))
        {
            if(empty($query->no_Rm) || $query->status == 1)
            {
                $this->emit('pasienBelumLengkap',$query->nik);

                // Mengirim data ke Pasienbaru.php //
                // mengaktifkan form jika pasien telah di daftar via form PTM //
               
                $this->emit('formAktif',false);

                // ----------------------------//

                // Mengirim data ke Pasienbaru.php //
                // mengktifkan Mode Update pada form //

                $this->emit('formUpdate',0);

                //-----------------------------------//


                $this->dispatchBrowserEvent('alert',['title'=>'Perhatian','icon'=>'warning','text'=>'Data Pasien Belum Lengkap']);
            }
            else
            {
                $this->dispatchBrowserEvent('alert',['title'=>'Perhatian','icon'=>'error','text'=>'Pasien Telah Terdaftar']);
                $this->emit('formAktif',true);
                $this->emit('formReset');

            }
        }
       
    }

    public function tidakAdaNik()
    {
        $this->emit('formAktif',false);
        $this->dispatchBrowserEvent('alert',['title'=>'Perhatian','icon'=>'warning','text'=>'Pasien yang tidak Memiliki NIK Hanya Pasien yang Berumur < 5 Tahun']);
    }
}
