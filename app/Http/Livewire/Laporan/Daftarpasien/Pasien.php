<?php

namespace App\Http\Livewire\Laporan\Daftarpasien;

use Livewire\Component;
use App\Models\User;
use \Illuminate\Support\Facades\DB;
class Pasien extends Component
{   public $pasien;
    public $dataJumlah;
    protected $listeners = ['ubahData'=>'cariLaporan'];
    public function render()
    {
        return view('livewire.laporan.daftarpasien.pasien');
    }

    public function mount()
    {
        $table = DB::table('pasiens')
        ->join('users','pasiens.id_user','users.id')
        ->selectRaw('count(pasiens.id_user) as jumlah , users.name')
        ->where('users.role',1)
        ->groupBy('users.name')->get();
        foreach($table as $data)
        {
            $query['label'][] = $data->name;
            $query['data'][] = $data->jumlah;
        }
        $this->pasien = json_encode($query);
    }

    public function cariLaporan()
    {  
       $this->dispatchBrowserEvent('berhasilUpdate');
    }


  
}
