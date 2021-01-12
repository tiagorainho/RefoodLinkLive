<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Livewire\Component;
use App\Rules\PasswordsMatch;

class Register extends Component
{
    public $user = [
        'first_name'            => '',
        'last_name'             => '',
        'email'                 => '',
        'password'              => '',
        'password_confirmation' => '',
    ];

    protected $rules = [
        'user.first_name'               => 'required',
        'user.last_name'                => 'required',
        'user.email'                    => 'required|email|unique:users,email',
        'user.password'                 => 'required',
        'user.password_confirmation'    => 'required',
    ];

    protected $messages = [
        'user.first_name.required' => 'O primeiro nome é obrigatório',
        'user.last_name.required' => 'O último nome é obrigatório',
        'user.email.unique' => 'O email já se encontra em uso',
    ];

    public function render()
    {
        return view('auth.register')->extends('auth.base');
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function mount()
    {
        Auth::logout();
    }

    public function submit()
    {
        $this->validate();
        $this->validateOnly('user', [
            'user' => [new PasswordsMatch],
        ]);

        User::create([
            'first_name'        => $this->user['first_name'],
            'last_name'         => $this->user['last_name'],
            'email'             => $this->user['email'],
            'password'          => Hash::make($this->user['password']),
            'type'              => 0,
            'favorite_establishments' => [],
        ]);
        session()->flash('server-notification', [
            'mode' => 'success',
            'message' => 'Registado com sucesso!'
            ]);
        return redirect('/entrar');
    }

}
