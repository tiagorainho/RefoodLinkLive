<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Establishment;

class Catalog extends Component
{
    public $available;
    public $unavailable;

    protected function getListeners()
    {
        return [
            'refreshParent'  => '$refresh',
        ];
    }

    public function render()
    {
        return view('components.catalog');
    }

    public function mount($id)
    {
        $this->available = Establishment::find($id)->availableProducts()->get();
        $this->unavailable = Establishment::find($id)->unavailableProducts()->get();
    }
}
