<?php

namespace App\Http\Livewire\Tambahuser;

use Livewire\Component;
use App\Models\User;

class Modaledituser extends Component
{   
    public $nama;
    public $idUser;
    public $password;
    public $re_password;
    public $email;
    public $role;
    public $status = 0;
    public $txtpass=true;

    protected $listeners = ['edituser'=>'edituser'];

    public function render()
    {
        return view('livewire.tambahuser.modaledituser');
    }

    private function clear()
    {
        $this->nama     = "";
        $this->email    = "";
        $this->role     = "";
        $this->status   = "";
    }   

    public function edituser($id)
    {   $this->idUser = $id;
        $query = User::find($id);
            $this->nama             =   $query->name;
            $this->email            =   $query->email;
            $this->role             =   $query->role;
            $this->status           =   $query->status_user;
    }
    
    protected $rules = ([
        'nama'          =>  'required',
        'email'         =>  'required',
        'role'          =>  'required|max:1',     
        'status'        =>  'required|max:1',
        'password'      =>  'max:20',         
        're_password'   =>  'max:20|same:password'
    ]); 

    protected $messages =([
        're_password.same'          =>  'Password yang anda masukan tidak sesuai',
        'password.min'              =>  'Password minimal 8 karakter',
        're_password.min'              =>  'Password minimal 8 karakter',

    ]);

    public function edit()
    {   $this->validate();
        $query = User::find($this->idUser)->update([
            'name'          =>  $this->nama,
            'role'          =>  $this->role,
            'status_user'   =>  $this->status,
        ]);

        if($query)
        {   $this->clear();
            $this->dispatchBrowserEvent('edituser');
            $this->emit('refresh');
        }
    }

    public function formedit()
    {
        $this->txtpass = false;
    }
}
