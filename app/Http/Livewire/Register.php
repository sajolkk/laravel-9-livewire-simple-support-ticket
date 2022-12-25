<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public $form = [
        'name' => '',
        'email' => '',
        'password' => '',
        'password_confirmation' => '',
    ];
    public function render()
    {
        return view('livewire.register');
    }

    // new user register function
    public function register()
    {
        $this->validate([
            'form.name' => 'required',
            'form.email' => 'required|unique:users,email|email',
            'form.password' => 'required|min:6|max:10|confirmed'
        ]);
        User::create($this->form);
        return redirect()->route('login');
    }
}
