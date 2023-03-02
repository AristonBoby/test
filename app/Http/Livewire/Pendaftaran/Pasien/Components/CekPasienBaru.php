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

    protected $rules = ([
        'nik' => 'required||min:16',
    ]);

    protected $messages = [
        'nik.required'  => 'NIK wajib di isi',
        'nik.min'       => 'Panjang NIK Minimal 16 '
    ];

    public function cekPasien ()
    {   $this->validate();
        $query = pasien::where('nik',$this->nik)->first();
        if(empty($query->nik))
        {   $this->emit('formReset');
            $this->dispatchBrowserEvent('alert',['title'=>'Berhasil','icon'=>'success','timer'=>5000,'text'=>'Pasien belum terdaftar']);
            $this->emit('formAktif',false);
            $this->emit('formUpdate',1);

        }
        if(!empty($query->nik))
        {
            if(empty($query->no_Rm) || $query->status == 1)
            {
                $this->emit('pasienBelumLengkap',$query->id);

                // Mengirim data ke Pasienbaru.php //
                // mengaktifkan form jika pasien telah di daftar via form PTM //

                $this->emit('formAktif',false);

                // ----------------------------//

                // Mengirim data ke Pasienbaru.php //
                // mengktifkan Mode Update pada form //

                $this->emit('formUpdate',0);

                //-----------------------------------//


                $this->dispatchBrowserEvent('alert',['title'=>'Perhatian','icon'=>'warning','text'=>'Data Pasien Belum Lengkap, Lengkapi Data Pasien']);
            }
            else
            {
                $this->dispatchBrowserEvent('alert',['title'=>'Perhatian','icon'=>'error','text'=>'Pasien Telah Terdaftar']);
                $this->emit('formAktif',true);
                $this->emit('formReset');

            }
        }

    }

    public function tanpaNIK()
    {   $this->emit('formUpdate',1);
        $this->emit('formReset');
        $this->emit('formAktif',false);
        $this->dispatchBrowserEvent('alert',['title'=>'Perhatian','icon'=>'warning','text'=>'Pasien yang tidak Memiliki NIK Hanya Pasien yang Berumur < 5 Tahun']);
    }
}
