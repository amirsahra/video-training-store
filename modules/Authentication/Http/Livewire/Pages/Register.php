<?php

namespace Modules\Authentication\Http\Livewire\Pages;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Modules\Authentication\Entities\User;

class Register extends Component
{
    public string $username, $email, $password, $password_confirmation;

    protected $rules = [
        'username' => 'required|unique:users,username',
        'email' => 'required|unique:users,email|email',
        'password' => 'required|confirmed|min:6'
    ];

    public function render()
    {
        return view('authentication::livewire.pages.register');
    }

    private function resetInputFields()
    {
        $this->username = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
    }

    public function doRegister()
    {
        $this->validate();

        $this->password = Hash::make($this->password);

        User::create([
            'username' => $this->username,
            'email' => $this->email,
            'password' => $this->password,
        ]);

        session()->flash('message', 'Your register successfully Go to the login page.');

        $this->resetInputFields();
    }
}
