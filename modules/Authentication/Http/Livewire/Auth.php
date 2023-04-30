<?php

namespace Modules\Authentication\Http\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Auth extends Component
{
    public bool $login, $register, $forgot;
    public string $token;

    public function mount(): void
    {
        $this->login = true;
    }

    public function render(): View
    {
        return view('authentication::livewire.auth');
    }

    public function loginContent(): void
    {
        $this->contentEnabler('login');
    }

    public function registerContent(): void
    {
        $this->contentEnabler('register');
    }

    public function forgotContent(): void
    {
        $this->contentEnabler('forgot');
    }

    private function contentEnabler(string $contentName): void
    {
        $this->login = false;
        $this->register = false;
        $this->forgot = false;

        if ($contentName == 'login')
            $this->login = true;
        if ($contentName == 'register')
            $this->register = true;
        if ($contentName == 'forgot')
            $this->forgot = true;
    }
}
