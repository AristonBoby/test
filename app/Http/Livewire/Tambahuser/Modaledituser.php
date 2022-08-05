<?php

namespace App\Http\Livewire\Tambahuser;

use Livewire\Component;
use App\Models\User;

class Modaledituser extends Component
{   public $nama;
    public $idUser;
    public $email;
    public $role;
    public $status;
    public $txtpass=true;
    protected $listeners = ['edituser'=>'edituser'];

    public function render()
    {
        return view('livewire.tambahuser.modaledituser');
    }
    public function mount(){

    }

    private function clear()
    {
        $this->nama     = "";
        $this->email    = "";
        $this->role     = "";
    }

    public function edituser($id)
    {   $this->idUser = $id;
        $query = User::find($id);
            $this->nama             =   $query->name;
            $this->email            =   $query->email;
            $this->role             =   $query->role;
            $this->status        =   $query->status_user;
    }

    public function edit()
    {
        $query = User::find($this->idUser)->update([
            'name'          =>  $this->nama,
            'email'         =>  $this->email,
            'role'          =>  $this->role,
            'status_user'   =>  $this->status,
        ]);
    }

    public function formedit()
    {
        $this->txtpass = false;
    }
}
