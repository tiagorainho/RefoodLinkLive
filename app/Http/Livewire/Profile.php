<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;

class Profile extends Component
{
    public $wannabe_seller = false;
    public $user;

    protected function getListeners()
    {
        return [
            'refreshParent' => '$refresh'
        ];
    }

    public function render()
    {
        return view('pages.profile');
    }

    public function mount()
    {
        $this->user = Auth()->user();
    }

    public function openCreateSellerModal()
    {
        if($this->wannabe_seller) {
            $this->dispatchBrowserEvent('openModal', [
                'modalId' => 'modalCreateSeller'
                ]);
        }
    }
}
