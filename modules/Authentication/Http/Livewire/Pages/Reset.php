<?php

namespace Modules\Authentication\Http\Livewire\Pages;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Password;
use Modules\Authentication\Entities\User;

class Reset extends Component
{
    public string $password, $password_confirmation, $email, $token;
    public bool $isReset;

    protected $rules = [
        'token' => 'required',
        'email' => 'required|email|exists:users,email',
        'password' => 'required|confirmed|min:6'
    ];

    public function mount()
    {
        $this->isReset = false;
    }

    public function render(): View
    {
        return view('authentication::livewire.pages.reset');
    }

    public function doReset(): void
    {
        $this->validate();
        $status = Password::reset([
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
            'token' => $this->token
        ],
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        Password::PASSWORD_RESET
            ? session()->flash('message', __($status))
            : session()->flash('error', __($status));

        $this->isReset = true;
    }
}
