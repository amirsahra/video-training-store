<?php

namespace Modules\Authentication\Http\Livewire\Pages;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class Login extends Component
{
    public string $username, $email, $password;

    protected $rules = [
        'email' => 'required|exists:users,email|email',
        'password' => 'required|min:6'
    ];

    public function render(): View
    {
        return view('authentication::livewire.pages.login');
    }

    public function doLogin()
    {
        $this->validate();

        if (Auth::attempt(array('email' => $this->email, 'password' => $this->password))) {
            session()->flash('message', "You are Login successful.");
            return Redirect::route('home');
        }
        session()->flash('error', 'email and password are wrong.');
    }
}
