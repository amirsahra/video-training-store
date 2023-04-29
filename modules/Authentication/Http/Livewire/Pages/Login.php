<?php

namespace Modules\Authentication\Http\Livewire\Pages;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;


class Login extends Component
{
    public string $username, $email, $password, $rememberMe;

    protected $rules = [
        'username' => 'required',
        'password' => 'required|min:6'
    ];

    public function mount()
    {
        $this->rememberMe = false;
    }

    public function render(): View
    {
        return view('authentication::livewire.pages.login');
    }

    public function doLogin()
    {
        $this->validate();

        $fieldType = filter_var($this->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (auth()->attempt([$fieldType => $this->username, 'password' => $this->password], $this->rememberMe)) {
            session()->flash('message', "You are Login successful.");
            return Redirect::route('home');
        } else
            session()->flash('error', 'email and password are wrong.');
    }
}
