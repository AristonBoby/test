<?php

namespace App\Http\Livewire\Pendaftaran\Pasien\Components;
use App\Models\pasien;
use Livewire\Component;
use App\Models\provinsi;
use App\Models\kota;
use App\Models\kecamatan;
use App\Models\kelurahan;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Datapasien extends Component
{
    public $cariPasien;
    public $nama;
    public $no_Rm;
    public $tempat_Lahir;
    public $tanggal_Lahir; 
    public $kepala_keluarga;
    public $pekerjaan;
    public $jenkel;
    public $agama;
    public $no_tlpn;
    public $nik,$bpjs,$alamat;
    public $delete_id;
    public $caripasien;
    public $id_pasien;
    public $kel_name;
    public $prov;      
    public $kotas;     
    public $kelurahan; 
    public $kecamatan; 
    public $prov_name;
    public $kec_name;
    public $kota_name;
    use WithPagination;
    protected $listeners = ['deleteConfirmed' => 'hapusPasien'];
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire..pendaftaran.pasien.components.datapasien',[
        'pasien'    =>  pasien::where('nama', 'like', '%' .$this->caripasien. '%')->orWhere('nik',$this->caripasien)->orWhere('bpjs',$this->caripasien)->paginate(10),
        'provinsi'  =>  provinsi::all(),
        'kota'      =>  kota::where('prov_id',$this->prov)->get(),
        'kec'       =>  kecamatan::where('kota_id',$this->kotas)->get(),
        'kel'       =>  kelurahan::where('kec_id',$this->kecamatan)->get()
        ]);
    }

    public function show()
    {
        return view('datapasien');
    }

    public function mount(){
        $this->tanggal_Lahir = date('Y-m-d');
        $this->caripasien = '';
    }
    protected $rules =([
        'no_Rm'             => 'required|max:8',
        'nama'              => 'required',
        'tempat_Lahir'      => 'required',
        'tanggal_Lahir'     => 'required',
        'kepala_keluarga'   => 'required',
        'jenkel'            => 'required',
        'agama'             => 'required',
        'no_tlpn'           => 'required',
        'nik'               => 'max:16',
        'bpjs'              => 'max:13',
        'pekerjaan'         => 'required',
        'alamat'            => 'required',
        'kelurahan'         => 'required',
    ]);
    protected $messages =[
        'no_Rm.required'=>'Nomor Rekam Medis wajib di isi',
        'max'=>'Nomor Rekam Medis Maksimal 8 Karakter',
        'nama.required'=>'Nama Pasien wajib diisi',
        'tempat_Lahir.required'=>'Tempat lahir Pasien wajib diisi',
        'tanggal_Lahir.required'=>'Tanggal lahir Pasien wajib diisi',
        'kepala_keluarga.required'=>'Kepala keluarga Pasien wajib diisi',
        'jenkel.required'=>'Jenis Kelamin Pasien wajib diisi',
        'agama.required'=>'Agama Pasien wajib diisi',
        'pekerjaan.required'=>'Pekerjaan Pasien wajib diisi',
        'no_tlpn.required'=>'Nomor Telepon / Hp Pasien wajib diisi',
        'alamat.required'=>'Alamat Pasien wajib diisi',
        'nik.unique'=>'NIK Pasien telah digunakan',
        'nik.max'=>'NIK Pasien Maksimal 16 karakter',
        'bpjs.unique'=>'Nomor BPJS Pasien telah digunakan',
        'bpjs.max'=>'Nomor BPJS Pasien Maksimal 13 Karakter',
    ];

    
    public function edit ($data){
        $this->detailPasien($data);
    }


    // Menampilkan data pasien UNTUK EDIT > PENDAFTARAN PASIEN > DATA PASIEN >EDIT //
    public function detailPasien($data){

           $query = DB::table('pasiens')
                    ->join('kelurahans','pasiens.kel_id','kelurahans.id_kel')
                    ->join('kecamatans','kelurahans.kec_id','kecamatans.id_kec')
                    ->join('kotas','kecamatans.kota_id','kotas.kota_id')
                    ->join('provinsis','kotas.prov_id','provinsis.prov_id')
                    ->select('*','kelurahans.id_kel','kecamatans.id_kec','kotas.kota_id','provinsis.prov_id')
                    ->where('pasiens.id',$data)->first();
                
           if($query){
            $this->id_pasien        =   $query->id;
            $this->nama             =   $query->nama; 
            $this->no_Rm            =   $query->no_Rm;
            $this->agama            =   $query->agama;
            $this->tempat_Lahir     =   $query->tempat_Lahir;
            $this->tanggal_Lahir    =   $query->tanggal_Lahir;
            $this->kepala_keluarga  =   $query->kepala_keluarga;
            $this->jenkel           =   $query->jenkel;
            $this->pekerjaan        =   $query->pekerjaan;
            $this->nik              =   $query->nik;
            $this->bpjs             =   $query->bpjs;
            $this->alamat           =   $query->alamat;   
            $this->no_tlpn          =   $query->no_tlpn; 
            $this->kelurahan        =   $query->kel_id;
            $this->kel_nama         =   $query->kel_name;
            $this->prov             =   $query->prov_id;
            $this->kotas            =   $query->kota_id;
            $this->kecamatan        =   $query->id_kec;
            $this->kec_name         =   $query->kec_name;
            $this->kel_name         =   $query->kel_name;
            $this->kota_name        =   $query->kel_name;
            $this->prov_name        =   $query->prov_name;
           }else{

            $query = pasien::find($data);
            $this->id_pasien        =   $query->id;
            $this->nama             =   $query->nama; 
            $this->no_Rm            =   $query->no_Rm;
            $this->agama            =   $query->agama;
            $this->tempat_Lahir     =   $query->tempat_Lahir;
            $this->tanggal_Lahir    =   $query->tanggal_Lahir;
            $this->kepala_keluarga  =   $query->kepala_keluarga;
            $this->jenkel           =   $query->jenkel;
            $this->pekerjaan        =   $query->pekerjaan;
            $this->nik              =   $query->nik;
            $this->bpjs             =   $query->bpjs;
            $this->alamat           =   $query->alamat;   
            $this->no_tlpn          =   $query->no_tlpn;
            $this->kelurahan        =   "";
            $this->prov             =   "";
            $this->kotas            =   "";
            $this->kecamatan        =   "";
            }
    }
    // END //

    public function editPasien ()
    {   $this->validate();
        $query = pasien::find($this->id_pasien);
        $query->update([
            'no_Rm'             =>  $this->no_Rm,
            'nama'              =>  $this->nama,
            'agama'             =>  $this->agama,
            'tempat_Lahir'      =>  $this->tempat_Lahir,
            'tanggal_Lahir'     =>  $this->tanggal_Lahir,
            'kepala_keluarga'   =>  $this->kepala_keluarga,
            'jenkel'            =>  $this->jenkel,
            'pekerjaan'         =>  $this->pekerjaan,
            'nik'               =>  $this->nik,
            'bpjs'              =>  $this->bpjs,
            'alamat'            =>  $this->alamat,
            'no_tlpn'           =>  $this->no_tlpn,
            'kel_id'            =>  $this->kelurahan,
        ]);
        if($query){
            $this->dispatchBrowserEvent('editPasien');
            $this->prov="";
        }
    }

    public function deleteConfirmation($id){
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function hapusPasien(){
            $query = pasien::where('id', $this->delete_id)->delete();
            if($query){
                $this->dispatchBrowserEvent('hapus');
                $this->render();
            }else{
                dd('error');
            }
    }

}
