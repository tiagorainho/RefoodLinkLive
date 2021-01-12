<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Sidebar extends Component
{
    public $is_owner = false;

    protected function getListeners()
    {
        return [
            'refreshSidebar' => 'refreshSidebar',
        ];
    }

    public function refreshSidebar()
    {
        $this->is_owner = Auth()->user()->isSeller();
    }
    
    public function render()
    {
        return view('layouts.sidebar');
    }

    public function mount()
    {
        $this->is_owner = Auth()->user()->isSeller();
    }
}
