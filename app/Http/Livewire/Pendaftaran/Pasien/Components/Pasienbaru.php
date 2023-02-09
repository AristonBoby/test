<?php

namespace App\Http\Livewire\Pendaftaran\Pasien\Components;

use Livewire\Component;
use App\Models\pasien;
use App\Models\provinsi;
use App\Models\kota;
use App\Models\kecamatan;
use App\Models\kelurahan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class Pasienbaru extends Component
{
    public $no_Rm;
    public $nama;
    public $pasien= [
                    'varRm'             => '',
                    'varNama'           => '',
                    'varTmplahir'       => '',
                    'varTgllahir'       => '',
                    'varKepalakeluarga' => '',
                    'varKelamin'        => '',
                    'varAgama'          => '',
                    'varPekerjaan'      => '',
                    'varHp'             => '',
                    'varNik'            => '',
                    'varBpjs'           => '',
                    'varProvinsi'        => '',
                    'varKota'           => '',
                    'varKecamatan'      => '',
                    'varKelurahan'      => '',
                    'varAlamat'         => '',
                ];
    public $form = true;
    public $alamat;
    public $prov; // Variabel Provinsi
    public $kotas; //Vairabel Kota
    public $kecamatan;  //Variabel Kelurahan
    public $kelurahan; //Variabel Kelurahan
    public $idkelurahan;
    public $dataProv;
    public $modeUpdate = 1;
    public $listeners =[
                        'pasienBelumLengkap'=>'dataBlmLengkap',
                        'formAktif'=>'formAktif',
                        'formUpdate'=>'formUpdate',
                        'formReset'=>'formReset'
                        ];

    public function render()
    {
        return view('livewire.pendaftaran.pasien.components.pasienbaru',[
            'provinsi'  =>  provinsi::all(),
            'kota'      =>  kota::where('prov_id',$this->pasien['varProvinsi'])->get(),
            'kec'       =>  kecamatan::where('kota_id',$this->pasien['varKota'])->get(),
            'kel'       =>  kelurahan::where('kec_id',$this->pasien['varKecamatan'])->get()
        ]);

    }

    public function mount(){
        $this->tanggal_Lahir = date('Y-m-d');
    }


    // Untuk Mengaktifkan Form ketika data pasien tidak ada atau //
    // Pasien Telah terdaftar tetapi pasien didaftar melalui PTM //
    // Parameter dikirim CekPasienBaru.php Via emit //
    // bernilai false maka form aktif //

    public function formAktif($data){
        $this->form = $data;
    }

    // END //


    // Method formUpdate digunakan Untuk Mengubah Form Ke Mode Update //
    // parameter Menggunakan emit dari CekPasienBaru.php // 

    public function formUpdate($data)
    {
        $this->modeUpdate = $data;
    }

    // End //

    public function dataBlmLengkap($query)
    {   
        $data = DB::table('pasiens')
                    ->join('kelurahans','pasiens.kel_id','kelurahans.id_kel')
                    ->join('kecamatans','kelurahans.kec_id','kecamatans.id_kec')
                    ->join('kotas','kecamatans.kota_id','kotas.kota_id')
                    ->join('provinsis','kotas.prov_id','provinsis.prov_id')
                    ->select('*','kelurahans.kel_name','kecamatans.kec_name','kotas.kota_name','provinsis.prov_name')
                    ->where('nik',$query)->first();

        $this->no_Rm            = $data->no_Rm;
        $this->nama             = $data->nama;
        $this->tempat_Lahir     = $data->tempat_Lahir;
        $this->tanggal_Lahir    = $data->tanggal_Lahir;
        $this->kepala_keluarga  = $data->kepala_keluarga;
        $this->jenkel           = $data->jenkel;
        $this->agama            = $data->agama;
        $this->no_tlpn          = $data->no_tlpn;
        $this->nik              = $data->nik;
        $this->bpjs             = $data->bpjs;
        $this->prov             = $data->prov_id;
        $this->kotas            = $data->kota_id;
        $this->kelurahan        = $data->kec_id;
        $this->idkelurahan      = $data->id_kel;
        $this->alamat           = $data->alamat;
    }

    public function index ()
    {
        return view('livewire.pendaftaran.pasien.index');
    }


    protected $rules =([
        'pasien.varRm'                     => 'required|max:15|min:7',
        'pasien.varNama'                   => 'required',
        'pasien.varTmplahir'               => 'required',
        'pasien.varTgllahir'               => 'required',
        'pasien.varKepalakeluarga'         => 'required',
        'pasien.varKelamin'                => 'required',
        'pasien.varAgama'                  => 'required',
        'pasien.varHp'                     => 'required||min:10',
       // 'pasien.varNik'                    => 'unique:pasiens',
        //'pasien.varBpjs'                   => 'unique:pasiens',
        'pasien.varPekerjaan'              => 'required',
        'pasien.varAlamat'                 => 'required',
        'pasien.varKelurahan'              => 'required',
        'pasien.varProvinsi'               => 'required',
        'pasien.varKota'                   => 'required',
        'pasien.varKecamatan'              => 'required',


    ]);

    protected $messages = [
        'pasien.varRm.required'             =>'Nomor Rekam Medis wajib di isi',
        'pasien.varRm.unique'               =>'Nomor Rekam Medis telah digunakan',
        'pasien.varRm.max'                  =>'Nomor Rekam Medis Maksimal 15 Karakter',
        'pasien.varRm.max'                  =>'Nomor Rekam Medis Minimal 7 Karakter',
        'pasien.varNama.required'           =>'Nama Pasien wajib diisi',
        'pasien.varTmplahir.required'       =>'Tempat lahir Pasien wajib diisi',
        'pasien.varTgllahir.required'       =>'Tanggal lahir Pasien wajib diisi',
        'pasien.varKepalakeluarga.required' =>'Kepala keluarga Pasien wajib diisi',
        'pasien.varKelamin.required'        =>'Jenis Kelamin Pasien wajib diisi',
        'pasien.varAgama.required'          =>'Agama Pasien wajib diisi',
        'pasien.varPekerjaan.required'      =>'Pekerjaan Pasien wajib diisi',
        'pasien.varHp.required'             =>'Nomor Telepon / Hp Pasien wajib diisi',
        'pasien.varHp.min'                  =>'Nomor Telepon / Hp Minimal 10 Angka',
        'pasien.varAlamat.required'         =>'Alamat Pasien wajib diisi',
        'pasien.varNik.unique'              =>'NIK Pasien telah digunakan',
        'pasien.varBpjs.unique'             =>'Nomor BPJS Pasien telah digunakan',
        'pasien.varKelurahan.required'      =>'Kelurahan tidak boleh kosong',
        'pasien.varProvinsi.required'       =>'Provinsi tidak boleh kosong',
        'pasien.varKota.required'           =>'Kota tidak boleh kosong',
        'pasien.varKecamatan.required'      =>'Kecamatan tidak boleh kosong',

    ];
    

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
                    $this->dispatchBrowserEvent('alert',['title'=>'Berhasil','icon'=>'success','text'=>'Data Berhasil Tersimpan','btnConfrim'=>'OK']);
            }        
        }

    }

    // Proses Validasi Data Inputan Pasien Baru //

    private function validasi_data(){

        // Proses Validasi No RM Ganda & dan Jumlah Karakter //

            if(!empty($this->pasien['varRm'])){

                // Cek Nomor Rekam Medis Unique //
                $cekNoRekamMedis=Pasien::where('no_Rm',$this->pasien['varRm'])->first();
                // End //

                // Cek Panjang Inputan Nomor rekam Medis //
                // Minimal 8 Karakter //

                $noRm_Panjang=strlen($this->pasien['varRm']);

                // End //

                // Proses Validasi  Jika Nomor Rekam Medis Ganda tampilkan Tanpilkan Message //

                if(!empty($cekNoRekamMedis)){
                    $this->dispatchBrowserEvent('alert',['title'=>'Nomor Rekam Medis Telah Terdaftar','icon'=>'warning','text'=>''.$cekNoRekamMedis->nama.'','timer'=>10000]);
                    $this->form = false;
                    return back();
                }
                // End //

                // Proses Validasi panjang Nomor Rekam Medis  Jika Kurang Dari 5 Tampilkan Message //
                if($noRm_Panjang < 7){
                    $this->dispatchBrowserEvent('alert',['title'=>'Perhatian','icon'=>'warning','text'=>'Nomor Rekam Medis Minimal 7 Karakter','timer'=>10000]);
                    return back();
                }
                // End //
            }
            /* End Validasi No RM Ganda & dan Jumlah Karakter */

            if(!empty($this->pasien['varBpjs']) && empty($this->pasien['varNik'])){
                $this->dispatchBrowserEvent('alert',['title'=>'Perhatian','icon'=>'warning','text'=>'Pasien telah memiliki nomor BPJS pastikan NIK Pasien telah diisi !!!','timer'=>10000]);
                return back();
            }

            if(!empty($this->pasien['varNik'])){
                $nik_panjang = strlen($this->pasien['varNik']);
                $cekNik = pasien::where('nik',$this->pasien['varNik'])->first();

                if($nik_panjang < 16){
                    $this->dispatchBrowserEvent('alert',['title'=>'Perhatian','icon'=>'warning','text'=>'NIK Minimal 16 Angka','timer'=>10000]);
                    return back();
                }
                if(!empty($cekNik)){
                    $this->dispatchBrowserEvent('alert',['title'=>'NIK Telah Terdaftar','icon'=>'warning','text'=>' '.$cekNik->nama.' ','timer'=>10000]);
                    return back();
                }
            }

            if(!empty($this->pasien['varBpjs'])){
                $bpjs_panjang = strlen($this->pasien['varBpjs']);
                $cekBpjs = pasien::where('bpjs',$this->pasien['varBpjs'])->first();
                if($bpjs_panjang < 13){
                    $this->dispatchBrowserEvent('alert',['title'=>'Perhatian','icon'=>'warning','text'=>'BPJS Minimal 13 Angka','timer'=>10000]);
                    return back();
                }
                if(!empty($cekBpjs)){
                    $this->dispatchBrowserEvent('alert',['title'=>'BPJS Telah Terdaftar','icon'=>'warning','text'=>' '.$cekBpjs->nama.' ','timer'=>10000]);
                    return back();
                }
            }
            $this->validate();
    }
    // End Validasi Data Pasien Baru //


    /*------------------------------------*/
    /* Method Reset Form */

    public function formReset(){
        $this->pasien= [
            'varRm'             => '',
            'varNama'           => '',
            'varTmplahir'       => '',
            'varTgllahir'       => '',
            'varKepalakeluarga' => '',
            'varKelamin'        => '',
            'varAgama'          => '',
            'varPekerjaan'      => '',
            'varHp'             => '',
            'varNik'            => '',
            'varBpjs'           => '',
            'varProvinsi'        => '',
            'varKota'           => '',
            'varKecamatan'      => '',
            'varKelurahan'      => '',
            'varAlamat'         => '',
        ];
    }

    public function updateData()
    {
        dd($this->update['nama']);
    }

}
