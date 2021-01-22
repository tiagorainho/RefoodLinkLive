<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Establishment;
use App\Models\User;

class Establishments extends Component
{
    public $establishments = [];
    protected $listeners = [
        'refreshParent' => 'refreshEstablishments'
    ];

    public function render()
    {
        return view('pages.establishments');
    }

    public function mount()
    {
        $user = Auth()->user();
        if($user->isSeller())
            $this->establishments = $user->establishments()->get();
        else
            return abort(404);
    }

    public function refreshEstablishments()
    {
        $this->establishments = Auth()->user()->establishments()->get();
    }

}
