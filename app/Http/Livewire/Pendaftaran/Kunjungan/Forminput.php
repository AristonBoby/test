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
    public $dm;
    public $form = true;

    public $cari_Pasien_no_RM;
    protected $listeners =['cariDataPasien'=>'cariDataPasien','tanggalKunjungan'=>'tglKunjungan'];
      /*========================================*/
    /*     Mengubah tanggal Kunjungan        */
    /*======================================*/
    public function tglKunjungan($data)
    {
        $this->tanggal = $data;
    }
    public function render()
    {
        return view('livewire.pendaftaran.kunjungan.forminput',[
            'pilihpoli' => poli::where('status',1)->orderBy('nama_poli','desc')->get(),
            'jaminans'   => jaminan::where('status',1)->get()
        ]);
    }

    public function mount(){
        $this->tanggal = date('d-m-Y');
    }



    public function clear(){
        $this->id_pasien        = "";
        $this->tanggal          = date('d-m-Y');
        $this->poli             = "";
        $this->nama             = "";
        $this->no_Rm            = "";
        $this->tanggal_Lahir    = "";
        $this->nik              = "";
        $this->bpjs             = "";
        $this->no_tlpn          = "";
        $this->tanggal_Lahir    = "";
        $this->jeniskunjungan   = "";
        $this->emit('riwayatKunjungan','');
        $this->form             = true;
    }

    public function cariDataPasien($idData){
        $this->cari = $idData;
        $this->cekpasien();
    }



    // Method untuk mencek pasien ada atau tidak ada di database //
    public function cekpasien(){
        $query = pasien::where('nik',$this->cari)
                        ->orWhere('no_Rm',$this->cari)
                        ->orWhere('bpjs',$this->cari)->first();
        if($query)
        {
            if($query->nik =='' && \Carbon\Carbon::parse($query->tanggal_Lahir)->age >= 5)
            {
                $this->clear();
                $this->form = true;
                $this->dispatchBrowserEvent('alert',['title'=>'Perhatian','text'=>'Pasien Berumur Lebih Dari 5 Tahun Pastikan NIK Pasien Diisi','icon'=>'error','timer'=>3000]);

            }
            else{
                if($query->status ==1)
                {
                     $this->dispatchBrowserEvent('alert',['title'=>'Perhatian','text'=>'Data Pasien Tidak Lengkap Pastikan Data Pasien Lengkap','icon'=>'warning','timer'=>3000]);
                }
                else
                {
                    $this->id_pasien        =   $query->id;
                    $this->no_Rm            =   $query->no_Rm;
                    $this->nama             =   $query->nama;
                    $this->tanggal_Lahir    =   $query->tanggal_Lahir;
                    $this->bpjs             =   $query->bpjs;
                    $this->nik              =   $query->nik;
                    $this->no_tlpn          =   $query->no_tlpn;
                    $this->dm               =   $query->dm;
                    $this->form = false;
                    $this->emit('riwayatKunjungan',$this->id_pasien);
                }
            }
        }else{
            $this->dispatchBrowserEvent('alert',['title'=>'Perhatian','text'=>'Pasien Tidak Terdaftar','icon'=>'warning','timer'=>3000]);
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
        $this->tanggal = \Carbon\Carbon::parse($this->tanggal)->format('Y-m-d');
        $data = kunjungan::where('id_pasien',$this->id_pasien)->where('tanggal',$this->tanggal)->where('id_poli',$this->poli)->first();
        if($data)
        {
            $this->dispatchBrowserEvent('alert',['title'=>'Perhatian','text'=>'Pasien Telah DiInput Di Poli yang Sama','icon'=>'warning','timer'=>3000]);
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
                    $this->dispatchBrowserEvent('alert',['title'=>'Berhasil','text'=>'Data Berhasil Tersimpan','icon'=>'success','timer'=>3000]);
                    $this->clear();
                }
        }

    }

}
