<?php

namespace App\Http\Livewire\Pendaftaran\Pasien\Components;

use Livewire\Component;
use App\Models\pasien;
use App\Models\provinsi;
use App\Models\kota;
use App\Models\kecamatan;
use App\Models\kelurahan;
use Illuminate\Support\Facades\Auth;
class Pasienbaru extends Component
{
    public $no_Rm;
    public $nama;
    public $tempat_Lahir;
    public $tanggal_Lahir;
    public $kepala_keluarga;
    public $jenkel;
    public $agama;
    public $no_tlpn;
    public $pekerjaan;
    public $nik ='';
    public $bpjs='';
    public $alamat;
    public $prov; // Variabel Provinsi
    public $kotas; //Vairabel Kota
    public $kecamatan;  //Variabel Kelurahan
    public $kelurahan; //Variabel Kelurahan
    public $idkelurahan;
    public $dataProv;


    public function mount(){
        $this->tanggal_Lahir = date('Y-m-d');
    
    }
    public function render()
    {
        return view('livewire.pendaftaran.pasien.components.pasienbaru',[
            'provinsi'  =>  provinsi::all(),
            'kota'      =>  kota::where('prov_id',$this->prov)->get(),
            'kec'       =>  kecamatan::where('kota_id',$this->kotas)->get(),
            'kel'       =>  kelurahan::where('kec_id',$this->kelurahan)->get()
        ]);

    }

    public function index ()
    {
        return view('livewire.pendaftaran.pasien.index');
    }

    protected $rules =([
        'no_Rm'             => 'required|unique:pasiens|max:15',
        'nama'              => 'required',
        'tempat_Lahir'      => 'required',
        'tanggal_Lahir'     => 'required',
        'kepala_keluarga'   => 'required',
        'jenkel'            => 'required',
        'agama'             => 'required',
        'no_tlpn'           => 'required||min:10',
        'nik'               => 'unique:pasiens',
        'bpjs'              => 'unique:pasiens',
        'pekerjaan'         => 'required',
        'alamat'            => 'required',
        'idkelurahan'       => 'required',
    ]);

    protected $messages =[
        'no_Rm.required'            =>'Nomor Rekam Medis wajib di isi',
        'no_Rm.unique'              =>'Nomor Rekam Medis telah digunakan',
        'max'                       =>'Nomor Rekam Medis Maksimal 7 Karakter',
        'nama.required'             =>'Nama Pasien wajib diisi',
        'tempat_Lahir.required'     =>'Tempat lahir Pasien wajib diisi',
        'tanggal_Lahir.required'    =>'Tanggal lahir Pasien wajib diisi',
        'kepala_keluarga.required'  =>'Kepala keluarga Pasien wajib diisi',
        'jenkel.required'           =>'Jenis Kelamin Pasien wajib diisi',
        'agama.required'            =>'Agama Pasien wajib diisi',
        'pekerjaan.required'        =>'Pekerjaan Pasien wajib diisi',
        'no_tlpn.required'          =>'Nomor Telepon / Hp Pasien wajib diisi',
        'no_tlpn.min'               =>'Nomor Telepon / Hp Minimal 10 Angka',
        'alamat.required'           =>'Alamat Pasien wajib diisi',
        'nik.unique'                =>'NIK Pasien telah digunakan',
        'bpjs.unique'               =>'Nomor BPJS Pasien telah digunakan',
        'idkelurahan.required'      => 'Kelurahan tidak boleh kosong',
    ];
    // Proses Validasi Data Inputan Pasien Baru //
    private function validasi_data(){

        // Proses Validasi No RM Ganda & dan Jumlah Karakter //
            if(!empty($this->no_Rm)){
                // Cek Nomor Rekam Medis Unique //
                $cekNoRekamMedis=Pasien::where('no_Rm',$this->no_Rm)->first();
                // End //
                // Cek Panjang Inputan Nomor rekam Medis //
                // Minimal 8 Karakter //
                $noRm_Panjang=strlen($this->no_Rm);
                // End //
                
                // Proses Validasi  Jika Nomor Rekam Medis Ganda tampilkan Tanpilkan Message //
                if(!empty($cekNoRekamMedis)){
                    $this->dispatchBrowserEvent('alert',['title'=>'Perhatian','icon'=>'warning','text'=>'Nomor Rekam Medis Telah digunakan Atas Nama [ '.$cekNoRekamMedis->nama.' ]']);
                    return back();
                }
                // End //
                // Proses Validasi panjang Nomor Rekam Medis  Jika Kurang Dari 5 Tampilkan Message //
                if($noRm_Panjang < 7){
                    $this->dispatchBrowserEvent('alert',['title'=>'Perhatian','icon'=>'warning','text'=>'Nomor Rekam Medis Minimal 7 Karakter']);
                    return back();
                }
                // End //
            }
            // End Validasi No RM Ganda & dan Jumlah Karakter //

            if(!empty($this->bpjs) && empty($this->nik)){
                $this->dispatchBrowserEvent('alert',['title'=>'Perhatian','icon'=>'warning','text'=>'Pasien telah memiliki nomor BPJS pastikan NIK Pasien telah diisi!!!']);
                return back();
            }

            if(!empty($this->nik)){
                $nik_panjang = strlen($this->nik);
                if($nik_panjang < 16){
                    $this->dispatchBrowserEvent('alert',['title'=>'Perhatian','icon'=>'warning','text'=>'NIK Minimal 16 Angka']);
                    return back();
                }
            }

            if(!empty($this->bpjs)){
                $bpjs_panjang = strlen($this->bpjs);
                if($bpjs_panjang < 13){
                    $this->dispatchBrowserEvent('alert',['title'=>'Perhatian','icon'=>'warning','text'=>'BPJS Minimal 13 Angka']);
                    return back();
                }
            }
            $this->validate();
    }
    // End Validasi Data Pasien Baru //

    public function store(){
        if (!$this->validasi_data(false)){
            $query = pasien::create([
                'no_Rm'             => $this->no_Rm,
                'nama'              => $this->nama,
                'tempat_Lahir'      => $this->tempat_Lahir,
                'tanggal_Lahir'     => $this->tanggal_Lahir,
                'kepala_keluarga'   => $this->kepala_keluarga,
                'jenkel'            => $this->jenkel,
                'agama'             => $this->agama,
                'pekerjaan'         => $this->pekerjaan,
                'no_tlpn'           => $this->no_tlpn,
                'nik'               => $this->nik,
                'bpjs'              => $this->bpjs,
                'kel_id'            => $this->idkelurahan,
                'alamat'            => $this->alamat,
                'id_user'           => Auth::id(),
        ]);
    if($query){
                $this->no_Rm           = "";
                $this->nama            = "";
                $this->tempat_Lahir    = "";
                $this->tanggal_Lahir   = date('Y-m-d');
                $this->kepala_keluarga = "";
                $this->jenkel          = "";
                $this->agama           = "";
                $this->pekerjaan       = "";
                $this->nik             = "";
                $this->no_tlpn         = "";
                $this->bpjs            = "";
                $this->alamat          = "";
                $this->prov            = "";
                $this->kotas           = "";
                $this->kecamatan       = "";
                $this->kelurahan       = "";
                $this->render();
            $this->dispatchBrowserEvent('alert',['title'=>'Berhasil','icon'=>'danger','text'=>'Data Berhasil Tersimpan','btnConfrim'=>'OK']);
            }
        }

    }
}
