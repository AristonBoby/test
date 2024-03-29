<?php

namespace App\Http\Livewire\Pendaftaran\Pasien\Components;
use App\Exports\PasiensExport;
use App\Models\pasien;
use Livewire\Component;
use App\Models\provinsi;
use App\Models\kota;
use App\Models\kecamatan;
use App\Models\kelurahan;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Facades\Excel;

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
    public $id_kel;
    public $prov;
    public $kotas;
    public $kelurahan;
    public $kecamatan;
    public $prov_name;
    public $kec_name;
    public $kota_name;
    public $datak='ratna';
    public $status=1;
    protected $listeners = ['deleteConfirmed' => 'hapusPasien'];
    protected $paginationTheme = 'bootstrap';
    use WithPagination;

    //Reset Paginate//
    public function updatingCaripasien()
    {
        $this->resetPage();
    }
    // end //

    public function render()
    {
        return view('livewire..pendaftaran.pasien.components.datapasien',[
        'pasien'=> DB::table('pasiens')
                                    ->join('users','pasiens.id_user','users.id')
                                    ->join('kelurahans','pasiens.kel_id','kelurahans.id_kel')
                                    ->join('kecamatans','kelurahans.kec_id','kecamatans.id_kec')
                                    ->join('kotas','kecamatans.kota_id','kotas.kota_id')
                                    ->select('pasiens.id',
                                             'pasiens.no_Rm',
                                             'pasiens.dm',
                                             'pasiens.ht',
                                             'pasiens.nama',
                                             'pasiens.created_at',
                                             'tanggal_Lahir',
                                             'pasiens.jenkel',
                                             'no_tlpn',
                                             'nik',
                                             'kecamatans.kec_name',
                                             'kotas.kota_name',
                                             'bpjs',
                                             'users.name',
                                             'pasiens.alamat',
                                             'kelurahans.kel_name',
                                             )
                                    ->where('pasiens.nama', 'like', '%' .$this->caripasien. '%')
                                    ->orWhere('no_Rm',$this->caripasien)
                                    ->orWhere('nik',$this->caripasien)
                                    ->orWhere('bpjs',$this->caripasien)
                                    ->orderBy('pasiens.no_Rm','asc')
                                    ->paginate(10),
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

    public function print()
    {   $data="ddd";
        $name = date('d M Y');
        return Excel::download(new PasiensExport($data), 'Master Data Pasien Tanggal '.$name.'.xls');
    }

    protected $rules =([
        'no_Rm'             => 'required',
        'nama'              => 'required',
        'tempat_Lahir'      => 'required',
        'tanggal_Lahir'     => 'required',
        'kepala_keluarga'   => 'required',
        'jenkel'            => 'required',
        'agama'             => 'required',
        'no_tlpn'           => 'required||min:10',
        'nik'               => '',
        'bpjs'              => '',
        'pekerjaan'         => 'required',
        'alamat'            => 'required',
        'kelurahan'         => 'required',
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
        'kelurahan.required'        =>'Kelurahan tidak boleh kosong',
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
        if(\Carbon\Carbon::parse($this->tanggal_Lahir)->age >= 5 && $this->nik ==='')
        {
            $this->dispatchBrowserEvent('alert',['title'=>'Warning','text'=>'Pasien Berumur Lebih dari 5 Tahun, NIK Pasien Wajib diisi','icon'=>'warning','timer'=>3000]);
        }
        else{
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
                'status'            =>  0,
            ]);
            if($query){
                $this->dispatchBrowserEvent('alert',['title'=>'Berhasil','text'=>'Data Berhsil Di Update','icon'=>'success','timer'=>3000]);
                $this->dispatchBrowserEvent('editTutup');
                $this->prov="";
            }
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

            }
    }

}
