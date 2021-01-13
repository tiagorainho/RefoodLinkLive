<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Establishment;
use App\Helpers\Location;

class CreateEstablishment extends Component
{
    public $establishment = [
        'name' => '',
        'description' => '',
        'address' => '',
        'city' => '',
        'country' => '',
        'schedule' => '',
        'contact' => '',
    ];

    protected $rules = [
        'establishment.name' => 'required|unique:establishments,name',
        'establishment.description' => 'required',
        'establishment.address' => 'required',
        'establishment.city' => 'required',
        'establishment.country' => 'required',
        'establishment.schedule' => 'required',
        'establishment.contact' => 'required',
    ];

    public function render()
    {
        return view('components.create-establishment');
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function submit()
    {
        $this->validate();
        $user = Auth()->user();
        
        $establishment_coords = Location::convert_address_to_coordinates([
            'address' => $this->establishment['address'],
            'city' => $this->establishment['city'],
            'country' => $this->establishment['country'],
        ]);

        Establishment::create([
            'owner_id'      => $user['id'],
            'name'          => $this->establishment['name'],
            'description'   => $this->establishment['description'],
            'image_url'     => 'imagem',
            'schedule'      => $this->establishment['schedule'],
            'address'       => $this->establishment['address'],
            'city'          => $this->establishment['city'],
            'country'       => $this->establishment['country'],
            'contact'       => $this->establishment['contact'],
            'coordinates'   => $establishment_coords,
        ]);
        
        $this->reset(['establishment']);
        $this->emit('refreshParent');
        $this->dispatchBrowserEvent('closeModal', ['modalId' => 'modal']);
        $this->dispatchBrowserEvent('server-notification', [
            'mode' => 'success',
            'message' => 'Estabelecimento criado com sucesso!'
            ]);
    }
}
