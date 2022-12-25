<?php

namespace App\Http\Livewire\Pendaftaran\Kunjungan;
use Illuminate\Support\Facades\Auth;
use App\Models\poli;
use App\Models\jaminan;
use App\Models\pasien;
use App\Models\kunjungan;
use Livewire\Component;

class Forminput extends Component
{
    public $tanggal;
    public $cari;
    public $poli;
    public $no_Rm;
    public $nama;
    public $tanggal_Lahir;
    public $bpjs;
    public $nik;
    public $no_tlpn;
    public $id_pasien;
    public $jeniskunjungan;
    public $form = true;

    public $cari_Pasien_no_RM;

    public function render()
    {
        return view('livewire.pendaftaran.kunjungan.forminput',[
            'pilihpoli' => poli::where('status',1)->orderBy('nama_poli','desc')->get(),
            'jaminans'   => jaminan::where('status',1)->get()
        ]);
    }

    public function mount(){
        $this->tanggal = date('Y-m-d');
    }

    public function clear(){
        $this->id_pasien        = "";
        $this->tanggal          = date('Y-m-d');
        $this->poli             = "";
        $this->nama             = "";
        $this->no_Rm            = "";
        $this->tanggal_lahir    = "";
        $this->nik              = "";
        $this->bpjs             = "";
        $this->no_tlpn          = "";
        $this->tanggal_Lahir    = "";
        $this->jeniskunjungan   = "";
        $this->form             = true;
    }
    // Method untuk mencek pasien ada atau tidak ada di database //
    public function cekpasien(){
        $query = pasien::where('nik',$this->cari)
                        ->orWhere('no_Rm',$this->cari)
                        ->orWhere('bpjs',$this->cari)->first();

        if($query)
        {
            $this->id_pasien        =   $query->id;
            $this->no_Rm            =   $query->no_Rm;
            $this->nama             =   $query->nama;
            $this->tanggal_Lahir    =   $query->tanggal_Lahir;
            $this->bpjs             =   $query->bpjs;
            $this->nik              =   $query->nik;
            $this->no_tlpn          =   $query->no_tlpn;
            $this->form = false;
            $this->emit('riwayatKunjungan',$this->id_pasien);
        }else{
            $this->dispatchBrowserEvent('dataTidakDitemukan');
            $this->form = true;
        }
    }
    //end//


    protected $rules = [
        'id_pasien'         => 'required',
        'tanggal'           => 'required',
        'poli'              => 'required',
        'jeniskunjungan'    => 'required',
    ];

    public function simpanKunjungan (){
        $this->validate();
        $data = kunjungan::where('id_pasien',$this->id_pasien)->where('tanggal',$this->tanggal)->where('id_poli',$this->poli)->first();
        if($data)
        {
            $this->dispatchBrowserEvent('kunjunganganda');
        }
        else{
            $query = kunjungan::create([
                'id_pasien'         =>  $this->id_pasien,
                'tanggal'           =>  $this->tanggal,
                'id_user'           =>  Auth::id(),
                'id_poli'           =>  $this->poli,
                'id_jaminan'        =>  $this->jeniskunjungan,
            ]);

            if($query)
                {
                    $this->dispatchBrowserEvent('kunjunganBerhasil');
                    $this->clear();
                }
        }

    }

}
