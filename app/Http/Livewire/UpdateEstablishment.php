<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Establishment;
use App\Helpers\Location;
use App\Rules\UniqueEstablishment;

class UpdateEstablishment extends Component
{
    public $establishment;

    public function rules() 
    {
        return [
            'establishment.name'        => 'required',
            'establishment.description' => 'required',
            'establishment.address'     => 'required',
            'establishment.city'        => 'required',
            'establishment.country'     => 'required',
            'establishment.schedule'    => 'required',
            'establishment.contact'     => 'required',
            'establishment'             => [new UniqueEstablishment],
        ];
    }

    public function render()
    {
        return view('components.create-establishment');
    }

    public function mount($id)
    {
        $this->establishment = Establishment::find($id);
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
        
        $establishment_new = Establishment::find($this->establishment['id']);
        $establishment_new->update([
            'name'          => $this->establishment['name'],
            'description'   => $this->establishment['description'],
            'schedule'      => $this->establishment['schedule'],
            'address'       => $this->establishment['address'],
            'city'          => $this->establishment['city'],
            'country'       => $this->establishment['country'],
            'contact'       => $this->establishment['contact'],
            'coordinates'   => $establishment_coords,
        ]);

        $this->emit('refreshParent');
        $this->dispatchBrowserEvent('closeModal', ['modalId' => 'modalEstablishEdit']);
        $this->dispatchBrowserEvent('server-notification', [
            'mode' => 'success',
            'message' => 'Estabelecimento atualizado com sucesso!'
            ]);
    }
}
