<?php
namespace App\Http\Livewire\Pendaftaran\Pasien\Components;
use App\Models\pasien;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\provinsi;
use App\Models\kecamatan;
use App\Models\kelurahan;
use App\Models\kota;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class EditdataPasien extends Component
{

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
    public $tanggal;
    public $id_pasien;
    public $kel_name;
    public $kec_name;
    public $kota_name;
    public $prov_name;
    public $prov;
    public $kotas;
    public $kecamatan;
    public $tglcari;

    // Variable General Consent //

    public $valStatusGeneral;
    public $valNamaGeneral;
    public $valJenkelGeneral;
    public $valAlamatGeneral;
    public $valHpGeneral;
    public $valIdPasien;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners= ['tglKunjungan'=>'tglKunjungan'];
    // Cara Reset Paginate LIVEWIRE//
    // updatingTanggal Merupakan method yang digabung dengan nama valiabel yang dicari contoh $tanggal //

    public function tglKunjungan($date){
         $this->tglcari = Carbon::parse($date)->format('Y-m-d');
    }

    public function updatingTanggal()
    {
        $this->resetPage();
    }
    //end//

    public function render()
    {
        return view('livewire.pendaftaran.pasien.components.editdata-pasien', [
                        'pasien'=> DB::table('pasiens')
                                    ->join('users','pasiens.id_user','users.id')
                                    ->select('pasiens.id','pasiens.no_Rm','pasiens.nama','tanggal_Lahir','jenkel','nik','bpjs','users.name')
                                    ->where('pasiens.created_at','LIKE','%'.$this->tglcari.'%')->where('status',0)->orderBy('pasiens.no_Rm','desc')->paginate(10),
                        'provinsi'  =>  provinsi::all(),
                        'kota'      =>  kota::where('prov_id',$this->prov)->get(),
                        'kec'       =>  kecamatan::where('kota_id',$this->kotas)->get(),
                        'kel'       =>  kelurahan::where('kec_id',$this->kecamatan)->get()
                    ]);
    }
    public function mount(){
        $this->tanggal_Lahir = date('Y-m-d');
        $this->tanggal = date('d-m-Y');
    }
    public function index ()
    {
        return view('livewire.pendaftaran.pasien.editdata-Pasien');

    }

    public function Tglcari()
    {
        $this->resetPage();
    }

    public function generalconsent()
    {
        $cetak = DB::table('generalconsents')
                 ->join('pasiens','generalconsents.id_pasien','pasiens.id')
                 ->where('id_pasien',intval($id))->first();
        if(!empty($cetak->no_Rm))
        {
            $this->dispatchBrowserEvent('modalGeneralConsent',['id'=>$cetak->no_Rm]);
        }else{
            $this->dispatchBrowserEvent('alert',['title'=>'Perhatian','icon'=>'warning','text'=>'Data GENEREAL CONSENT Belum diisi']);

        }
    }
    public function tampilkanGeneralConsent($id)
    {
        $this->valStatusGeneral     = '';
        $this->valNamaGeneral       = '';
        $this->valJenkelGeneral     = '';
        $this->valAlamatGeneral     = '';
        $this->valHpGeneral         = '';
        $this->valIdPasien          = '';

        $query =  DB::table('generalconsents')->where('id_pasien',$id)->first();

        if(!empty($query))
        {
            $this->valStatusGeneral     ='';
            $this->valNamaGeneral       = $query->nama;
            $this->valJenkelGeneral     = $query->jenkel;
            $this->valAlamatGeneral     = $query->alamat;
            $this->valHpGeneral         = $query->notlpn;
            $this->valIdPasien          = $id;
        }

    }




}
