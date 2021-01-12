<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    public $max_distance = 20000;
    public $distance;
    public $search;
    protected $queryString = ['search'];
    public $user;
    public $user_name = '';


    public function render()
    {
        return view('layouts.navbar');
    }

    public function updatedDistance()
    {   
        $this->user->distance = $this->distance;
        $this->user->save();
        $this->emit('refreshMaxRadius', $this->distance/1000, $this->search);
    }

    public function updatedSearch()
    {
        $this->emit('refreshEstablishmentSearch', $this->distance/1000, $this->search);
    }

    public function mount()
    {   
        $this->user = Auth()->user();
        $this->distance = $this->user->distance;
        $this->user_name = $this->user->first_name.' '.$this->user->last_name;
    }

    public function gotoSearch()
    {
        return redirect()->route('search', [
            'search' => $this->search
        ]);
    }
}
