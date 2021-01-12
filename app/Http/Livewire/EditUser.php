<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;


class EditUser extends Component
{
    public $user;

    public function render()
    {
        return view('components.edit-user');
    }

    protected $rules = [
        'user.first_name' => 'required',
        'user.last_name' => 'required',
    ];

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function mount()
    {
        $this->user = Auth()->user()->toArray();
    }

    public function submit()
    {
        $this->validate();
        $user_object = User::find($this->user['id']);
        $user_object->first_name   = $this->user['first_name'];
        $user_object->last_name    = $this->user['last_name'];
        $user_object->email        = $this->user['email'];
        $user_object->save();

        $this->dispatchBrowserEvent('server-notification', [
            'mode' => 'success',
            'message' => 'Definições de utilizador alteradas com sucesso!'
            ]);
    }
    
}
