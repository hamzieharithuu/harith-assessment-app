<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email, $password;
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];
    protected $messages = [
        'email.required' => '*Email is required.',
        'email.email' => '*This is not a valid email.',
        'password.required' => '*Password is required.'
    ];

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function login()
    {
        $this->validate();

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {
            session()->regenerate();
            $this->clear();
            session()->flash('toast', [
                'status' => 'success',
                'title' => 'Login success',
                'message' => "You've been successfuly logged in."
            ]);
            return redirect()->intended(route('company.list'));
        } else {
            $this->clear();
            $this->dispatch(
                'toastMagic',
                status: 'error',
                title: 'Login failed',
                message: "User nor found",
                options: [
                    'showCloseBtn' => true
                ],
            );
        }
    }
    public function clear()
    {
        $this->email = '';
        $this->password = '';
    }
}
