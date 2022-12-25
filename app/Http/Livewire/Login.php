<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $form = [
        'email' => '',
        'password' => '',
    ];
    public $loginmsg = '';
    public function render()
    {
        return view('livewire.login');
    }

    // user login function
    public function login()
    {
        $this->validate([
            'form.email' => 'required|exists:users,email',
            'form.password' => 'required|min:6|max:10'
        ]);
        if(Auth::attempt($this->form)){
            return redirect()->route('home');
        }else{
            $this->loginmsg = 'Invalid Password';
        }
        
    }
}
