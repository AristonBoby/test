<?php

namespace App\Http\Livewire\Tambahuser;

use Livewire\Component;
use App\Models\User;
class Formuser extends Component
{   public $status_user;
    public $nama;
    public $role;
    public $password;
    public $email;
    public $re_password;
    public function render()
    {
        return view('livewire..tambahuser.formuser');
    }

    public function simpanuser(){
       $query = User::create([
        'name'          =>  $this->nama,
        'email'         =>  $this->email,
        'password'      =>  $this->password,
        'status_user'   =>  $this->status_user,
        'role'          =>  $this->role,
       ]);
    }
}
