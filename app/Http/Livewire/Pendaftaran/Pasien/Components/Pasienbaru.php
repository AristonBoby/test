<?php

namespace App\Http\Livewire\Pendaftaran\Pasien\Components;

use Livewire\Component;
use App\Models\pasien;
use App\Models\provinsi;
use App\Models\kota;
use App\Models\kecamatan;
use App\Models\kelurahan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
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
                    'varProvinsi'       => '',
                    'varKota'           => '',
                    'varKecamatan'      => '',
                    'varKelurahan'      => '',
                    'varAlamat'         => '',
                ];
    public $form = true;
    public $modeUpdate = 1;
    public $listeners = [
                        'pasienBelumLengkap'    => 'dataBlmLengkap',
                        'formAktif'             => 'formAktif',
                        'formUpdate'            => 'formUpdate',
                        'formReset'             => 'formReset',
                        'selectDate'            => 'selectDate',
                        'formReset'             => 'formReset',
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
    public function selectDate($date)
    {
        $this->pasien['varTgllahir'] = $date;
    }
    public function mount(){
    
    }


    // Untuk Mengaktifkan Form ketika data pasien tidak ada atau //
    // Pasien Telah terdaftar tetapi pasien didaftar melalui PTM //
    // Parameter dikirim CekPasienBaru.php Via emit //
    // bernilai false maka form aktif //

    public function formAktif($data){
        $this->form = $data;
        $this->modeUpdate=1;
    }

    // END //


    // Method formUpdate digunakan Untuk Mengubah Form Ke Mode Update //
    // parameter Menggunakan emit dari CekPasienBaru.php // 

    public function formUpdate($data)
    {
        $this->modeUpdate = $data;
    }

    // End //

    public function dataBlmLengkap($id)
    {   
        $data = DB::table('pasiens')
                    ->join('kelurahans','pasiens.kel_id','kelurahans.id_kel')
                    ->join('kecamatans','kelurahans.kec_id','kecamatans.id_kec')
                    ->join('kotas','kecamatans.kota_id','kotas.kota_id')
                    ->join('provinsis','kotas.prov_id','provinsis.prov_id')
                    ->select('*','kelurahans.kel_name','kecamatans.kec_name','kotas.kota_name','provinsis.prov_name')
                    ->where('id',$id)->first();
        if($data){
            $this->pasien['varId']              = $data->id;
            $this->pasien['varRm']              = $data->no_Rm;
            $this->pasien['varNama']            = $data->nama;
            $this->pasien['varTmplahir']        = $data->tempat_Lahir;
            $this->pasien['varTgllahir']        = Carbon::parse($data->tanggal_Lahir)->format('d-m-Y');
            $this->pasien['varKepalakeluarga']  = $data->kepala_keluarga;
            $this->pasien['varKelamin']         = $data->jenkel;
            $this->pasien['varAgama']           = $data->agama;
            $this->pasien['varHp']              = $data->no_tlpn;
            $this->pasien['varNik']             = $data->nik;
            $this->pasien['varPekerjaan']       = $data->pekerjaan;
            $this->pasien['varBpjs']            = $data->bpjs;
            $this->pasien['varProvinsi']        = $data->prov_id;
            $this->pasien['varKota']            = $data->kota_id;
            $this->pasien['varKecamatan']       = $data->kec_id;
            $this->pasien['varKelurahan']       = $data->id_kel;
            $this->pasien['varAlamat']          = $data->alamat;     
        }
       
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
        'pasien.varRm.min'                  =>'Nomor Rekam Medis Minimal 7 Karakter',
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
        $this->modeUpdate=1;
        $date = Carbon::parse($this->pasien['varTgllahir'])->format('Y-m-d');
        if (!$this->validasi_data(false)){
            $query = pasien::create([
                'no_Rm'             => $this->pasien['varRm'],
                'nama'              => $this->pasien['varNama'],
                'tempat_Lahir'      => $this->pasien['varTmplahir'],
                'tanggal_Lahir'     => $date,
                'kepala_keluarga'   => $this->pasien['varKepalakeluarga'],
                'jenkel'            => $this->pasien['varKelamin'],
                'agama'             => $this->pasien['varAgama'],
                'pekerjaan'         => $this->pasien['varPekerjaan'],
                'no_tlpn'           => $this->pasien['varHp'],
                'nik'               => $this->pasien['varNik'],
                'bpjs'              => $this->pasien['varBpjs'],
                'kel_id'            => $this->pasien['varKelurahan'],
                'alamat'            => $this->pasien['varAlamat'],
                'id_user'           => Auth::id(),
                ]);

            if($query){
                    $this->formReset();
                    $this->modeUpdate=1;
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
        $this->form = true;
        $this->pasien= [
            'varRm'             => '',
            'varId'             => '',
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
            'varProvinsi'       => '',
            'varKota'           => '',
            'varKecamatan'      => '',
            'varKelurahan'      => '',
            'varAlamat'         => '',
        ];
    }

    public function updateData()
    {   
        $this->validate([
            'pasien.varRm'                     => 'required|unique:pasiens,no_Rm|max:15|min:7',
            'pasien.varNama'                   => 'required',
            'pasien.varTmplahir'               => 'required',
            'pasien.varTgllahir'               => 'required',
            'pasien.varKepalakeluarga'         => 'required',
            'pasien.varKelamin'                => 'required',
            'pasien.varAgama'                  => 'required',
            'pasien.varHp'                     => 'required||min:10',
            'pasien.varNik'                    => 'max:16',
            'pasien.varBpjs'                   => 'max:13',
            'pasien.varPekerjaan'              => 'required',
            'pasien.varAlamat'                 => 'required',
            'pasien.varKelurahan'              => 'required',
            'pasien.varProvinsi'               => 'required',
            'pasien.varKota'                   => 'required',
            'pasien.varKecamatan'              => 'required',
        ]);
        $query = pasien::find($this->pasien['varId']);

        if($query)
        {   $date = Carbon::parse($this->pasien['varTgllahir'])->format('Y-m-d');
            $data = $query->update([
                'no_Rm'             => $this->pasien['varRm'],
                'nama'              => $this->pasien['varNama'],
                'tempat_Lahir'      => $this->pasien['varTmplahir'],
                'tanggal_Lahir'     => $date,
                'kepala_keluarga'   => $this->pasien['varKepalakeluarga'],
                'jenkel'            => $this->pasien['varKelamin'],
                'agama'             => $this->pasien['varAgama'],
                'pekerjaan'         => $this->pasien['varPekerjaan'],
                'no_tlpn'           => $this->pasien['varHp'],
                'nik'               => $this->pasien['varNik'],
                'bpjs'              => $this->pasien['varBpjs'],
                'kel_id'            => $this->pasien['varKelurahan'],
                'alamat'            => $this->pasien['varAlamat'],
            ]);
            if($data)
            {
                $this->dispatchBrowserEvent('alert',['success'=>'Data Berhasil Tersimpan','icon'=>'success','timer'=>10000]);
            }
        }
       
    }

}
