<?php

namespace Modules\Authentication\Http\Livewire\Pages;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Password;
use JetBrains\PhpStorm\NoReturn;
use Livewire\Component;

class Forgot extends Component
{
    public string $email;
    public bool $isSend;

    public function mount()
    {
        $this->isSend = false;
    }

    protected $rules = [
        'email' => 'required|exists:users,email|email',
    ];


    public function render(): View
    {
        return view('authentication::livewire.pages.forgot');
    }

    #[NoReturn] public function sendEmailResetPassword(): void
    {
        $this->validate();

        $status = Password::sendResetLink(['email' => $this->email]);

        Password::RESET_LINK_SENT
            ? session()->flash('message', __($status))
            : session()->flash('error', __($status));

        $this->isSend = true;
    }
}
