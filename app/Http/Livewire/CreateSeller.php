<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class CreateSeller extends Component
{

    public $user = [
        'nif' => '',
        'swift' => '',
        'bank' => '',
        'holder' => '',
    ];

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
        return view('components.create-seller');
    }

    public function submit()
    {
        $this->validate();
        $user = Auth()->user();
        $user->update([
            'type' => User::RANK_SELLER,
            'nif' => $this->user['nif'],
            'swift' => $this->user['swift'],
            'bank' => $this->user['bank'],
            'holder' => $this->user['holder'],
        ]);

        $this->emit('refreshSidebar');
        $this->emit('refreshParent');
        
        $this->dispatchBrowserEvent('closeModal', ['modalId' => 'modalCreateSeller']);
        $this->dispatchBrowserEvent('server-notification', [
            'mode' => 'success',
            'message' => 'Transformação em vendedor concluída com sucesso!'
            ]);
    }

}
