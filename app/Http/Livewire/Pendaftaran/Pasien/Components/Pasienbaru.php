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
                        'selectDate'            => 'tglLahir',
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
    public function tglLahir($date)
    {
        $this->pasien['varTgllahir'] = $date;
    }


    /*==============================================================*/
    /*  Untuk Mengaktifkan Form ketika data pasien tidak ada atau   */
    /*  Pasien Telah terdaftar tetapi pasien didaftar melalui PTM   */
    /*  Parameter dikirim CekPasienBaru.php Via emit                */
    /*  bernilai false / true maka form aktif                       */
    /*==============================================================*/

    public function formAktif($data)
    {
        $this->form = $data;
        $this->modeUpdate=1;
    }


    /*==============================================================*/
    /*  untuk Mengubah mode form pada cek-pasien.blade.php          */
    /*==============================================================*/

    public function formUpdate($data)
    {
        $this->modeUpdate = $data;
    }


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


    /*==============================================================*/
    /*          Proses Penyimpanan data pasien Baru                 */
    /*          Data diambil pada pasienbaru.balade.php             */
    /*==============================================================*/


    public function store(){

        /*===================================================================*/
        /* Mengubah varTgllahir ke format database pada pasienbaru.blade.php */
        /*===================================================================*/

        $date = Carbon::parse($this->pasien['varTgllahir'])->format('Y-m-d');

        /*==============================================================*/
        /*          Proses Pemanggilan Method Validasi data             */
        /*          Jika data Pasien Berhasil di validasi lalu proses   */
        /*          Penyimpanan data                                    */
        /*==============================================================*/

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
                'status'            => 0,
                'id_user'           => Auth::id(),
                ]);

            if($query){
                    $this->formReset();
                    $this->modeUpdate=1;
                    $this->dispatchBrowserEvent('alert',['title'=>'Berhasil','icon'=>'success','text'=>'Data Berhasil Tersimpan','btnConfrim'=>'OK']);
            }
        }

    }


    /*==============================================================*/
    /*              Proses Validasi Data Pasien                     */
    /*==============================================================*/

    private function validasi_data(){
             /*==============================================================*/
            /*           Proses Validasi Umur MINIMAL 5 TH WAJIB NIK        */
            /*==============================================================*/
            $umur = \Carbon\Carbon::parse($this->pasien['varTgllahir'])->age;
            if($umur >= 5 && $this->pasien['varNik'] === '')
            {
                $this->dispatchBrowserEvent('alert',['title'=>'Perhatian','icon'=>'warning','text'=>'Pasien Telah Berumur Lebih Dari 5 Tahun Pastikan NIK Telah Diisi','timer'=>10000]);
                return back();
            }

            /*==============================================================*/
            /*           Proses Validasi Nomor Rekam Medis                  */
            /*==============================================================*/

            if(!empty($this->pasien['varRm'])){

                /*==============================================================*/
                /*      Proses pengecekan pada Database                         */
                /*      nomor Rekam Medis                                       */
                /*      Proses Pengecekan Panjang Minimal Karakter no RM 7      */
                /*==============================================================*/

                $cekNoRekamMedis=Pasien::where('no_Rm',$this->pasien['varRm'])->first();

                $noRm_Panjang=strlen($this->pasien['varRm']);


                /*====================================================================*/
                /* validasi Cek jika Rekam Medis telah digunakan maka tampilkan pesan */
                /*====================================================================*/

                if(!empty($cekNoRekamMedis)){
                    $this->dispatchBrowserEvent('alert',['title'=>'Nomor Rekam Medis Telah Terdaftar','icon'=>'warning','text'=>''.$cekNoRekamMedis->nama.'','timer'=>10000]);
                    $this->form = false;
                    return back();
                }

                /*==================================================================*/
                /*  validasi jika panjang Rekam Medis lebih dari 7 tampilakn pesan  */
                /*==================================================================*/

                if($noRm_Panjang < 7){
                    $this->dispatchBrowserEvent('alert',['title'=>'Perhatian','icon'=>'warning','text'=>'Nomor Rekam Medis Minimal 7 Karakter','timer'=>10000]);
                    return back();
                }

            }

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
        $this->modeUpdate=1;
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
                'status'            => 0,
            ]);
            if($data)
            {
                $this->dispatchBrowserEvent('alert',['icon'=>'success','title'=>'Data Berhasil Tersimpan','timer'=>10000]);
                $this->formReset();
            }
        }

    }

}
