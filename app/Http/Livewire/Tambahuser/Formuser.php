<?php

namespace App\Http\Livewire\Tambahuser;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use App\Models\User;
class Formuser extends Component
{   public $status_user = 1;
    public $nama = "";
    public $role = "";
    public $password = "";
    public $email = "";
    public $re_password= "";
    public $txtnama=true;
    public $txtemail=true;
    
    public function render()
    {
        return view('livewire..tambahuser.formuser');
    }
    
    protected $rules = ([
        'nama'          => 'required',
        'email'         => 'required|unique:users',
        'role'          => 'required',
        'password'      => 'required|min:8',
        're_password'   => 'required|same:password|min:8'
    ]);

    protected $messages = ([
        'nama.required'     =>  'Nama Wajib diisi',
        'email.required'    =>  'Email Wajib diisi ',
        'email.unique'      =>  'Email Telah digunakan, Masukan Email yang belum terdaftar ',
        'role.required'     =>  'Role User Wajib diisi ',
        'password.min'      =>  'Password Minimal 8 Karakter',
        'password.required' =>  'Password Wajib diisi',
        're_password.same'  =>  'Password yang anda masukan tidak sama'

    ]);

    public function validasiinputan($request){
       
       
       
        if($request=='nama')
          {
              $this->txtnama = false;
          }
         else if($request=='email')
          {
              $this->txtemail = false;
          }
    }

    public function simpanuser(){
        $this->validate();
        $query = User::create([
        'name'          =>  $this->nama,
        'email'         =>  $this->email,
        'password'      =>  Hash::make($this->password) ,
        'status_user'   =>  $this->status_user,
        'role'          =>  $this->role,
       ]);
            if($query)
            {
                $this->dispatchBrowserEvent('success');
            }
    }
}
