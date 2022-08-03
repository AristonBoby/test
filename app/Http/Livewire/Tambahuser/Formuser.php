<?php

namespace App\Http\Livewire\Tambahuser;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use App\Models\User;
class Formuser extends Component
{   public $status_user = 0;
    public $nama = "";
    public $role = "";
    public $password = "";
    public $email = "";
    public $re_password= "";
    
    public function render()
    {
        return view('livewire..tambahuser.formuser');
    }
    
    protected $rules =([
        'nama' => 'required',
    ]);

    protected $messages = ([
        'nama.required' =>  'Nama Wajib diisi'
    ]);

    public function simpanuser(){
        $this->validate();
       $query = User::create([
        'name'          =>  $this->nama,
        'email'         =>  $this->email,
        'password'      =>  Hash::make($this->password) ,
        'status_user'   =>  $this->status_user,
        'role'          =>  $this->role,
       ]);
    }
}
