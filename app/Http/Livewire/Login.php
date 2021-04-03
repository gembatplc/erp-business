<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{

    public $email;
    public $password;
    public $remember = true;


    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8',
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function login(Request $request)
    {
        $this->validate();
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
            
        }else{
            session()->flash('error', 'Email and Password Does not match our record,please try againg.');
        }
    }
    public function render()
    {
        return view('livewire.login');
    }
}
