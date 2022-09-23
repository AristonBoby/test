<?php

namespace App\Http\Livewire\Home;
use \Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\pasien;
class Index extends Component
{   public $tanggal;
    public function render()
    {   
        return view('livewire..home.index',[
            'jumlahpasien'      => pasien::all(),
            'jumlahperhari'     => pasien::where('id_user',Auth::id())->where('created_at','LIKE','%'.$this->tanggal.'%')->get(),
            'jumlahperUser'     => pasien::where('id_user',Auth::id())->get(),
            'jumlahperbulan'    => pasien::where('id_user',Auth::id())->where('created_at','LIKE','%'.$this->bulan.'%')->get(),

        ]);
    }

    public function mount()
    {
        $this->tanggal = date('Y-m-d');
        $this->bulan = date('Y-m');

    }
}
