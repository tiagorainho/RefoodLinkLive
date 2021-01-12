<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Rules\CredentialsCorrect;

class Login extends Component
{
    public $user = [
        'email'                 => '',
        'password'              => '',
        'remember'              => false,
    ];

    protected $rules = [
        'user.email'    => 'required|email',
        'user.password' => 'required',
    ];

    protected $messages = [
        'user.email.required' => 'O email é obrigatório',
        'user.password.required' => 'A password é obrigatória',
    ];

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function render()
    {
        return view('auth.login')->extends('auth.base');
    }

    public function mount()
    {
        Auth::logout();
    }
    
    public function submit()
    {
        $this->validate();
        $this->validateOnly('user', [
            'user' => [new CredentialsCorrect],
        ]);

        session()->flash('server-notification', [
            'mode' => 'success',
            'message' => 'Bem vindo '.Auth()->user()->first_name.'!'
            ]);
        return redirect('/');
    }
}
