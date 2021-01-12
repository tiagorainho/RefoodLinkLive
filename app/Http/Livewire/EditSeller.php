<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EditSeller extends Component
{

    public $user;

    protected $rules = [
        'user.nif'      => 'required',
        'user.swift'    => 'required',
        'user.bank'     => 'required',
        'user.holder'   => 'required',
    ];

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function render()
    {
        return view('components.edit-seller');
    }

    public function mount()
    {
        $this->user = Auth()->user()->toArray();
    }

    public function submit()
    {
        $this->validate();
        $user_object = User::find($this->user['id']);
        $user_object->nif           = $this->user['nif'];
        $user_object->swift         = $this->user['swift'];
        $user_object->bank          = $this->user['bank'];
        $user_object->holder        = $this->user['holder'];
        $user_object->save();
        
        $this->dispatchBrowserEvent('server-notification', [
            'mode' => 'success',
            'message' => 'Definições de vendedor alteradas com sucesso!'
            ]);
    }
}
