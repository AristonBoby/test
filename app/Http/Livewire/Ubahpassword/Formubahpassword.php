<?php

namespace App\Http\Livewire\Ubahpassword;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Formubahpassword extends Component
{   public $password_lama;
    public $re_password;
    public $password;
    public function render()
    {
        return view('livewire..ubahpassword.formubahpassword');
    }

    public function show()
    {
        return view('ubahpassword');
    }
    
    protected $rules = ([
        'password_lama' => 'required',
        'password'      => 'required',
        're_password'   => 'required|same:password',
    ]);

    protected $messages = [
        're_password.same'         =>  'Password tidak sama',
        're_password.required'     =>  'Password tidak boleh kosong',

    ];
    
    public function resetpassword(){
        $this->validate();
        if(Hash::check($this->password_lama,Auth::user()->password))
        {   

            $q = User::find(Auth::user()->id)->update([
                'password' => Hash::make($this->password)
            ]);

            if($q){
                $this->password_lama ='';
                $this->password ='';
                $this->re_password  ='';
                $this->dispatchBrowserEvent('logout');
            }
            else{
                $this->dispatchBrowserEvent('editPasswordError');
            }
        }
        else{
            $this->dispatchBrowserEvent('editPasswordError');
        }
    }

}
