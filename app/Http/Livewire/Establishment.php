<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Establishment as EstablishmentModel;

class Establishment extends Component
{
    public $user;
    public $is_owner = false;
    public $establishment;
    public $client_mode = false;
    public $favorite;

    protected function getListeners()
    {
        return [
            'refreshParent' => 'refreshEstablishment',
            'setupMap' => 'setupMap',
        ];
    }

    public function toggleFavorite()
    {
        $this->favorite = !$this->favorite;
        if($this->favorite) {
            $this->user->addFavoriteEstablishment($this->establishment->id);
        }
        else {
            $this->user->removeFavoriteEstablishment($this->establishment->id);
        }
    }

    public function render()
    {
        return view('pages.establishment');
    }

    public function mount($id)
    {
        $this->establishment = EstablishmentModel::findOrFail($id);
        $this->user = Auth()->user();
        if($this->user->isSeller()) {
            foreach($this->user->establishments() as $establishment) {
                if($establishment->id == $id) {
                    $this->is_owner = true;
                    break;
                }
            }
        }
        $this->favorite = false;
        foreach($this->user->favorite_establishments as $id) {
            if($id == $this->establishment->id) {
                $this->favorite = true;
            }
        }
    }

    public function updatedClientMode()
    {
        $coords = $this->establishment['coordinates'];

        if($this->client_mode || !$this->is_owner) {
            $this->dispatchBrowserEvent('startMap', [
                'api_key' => env('MAPBOX_API_KEY'),
                'destination' => [$coords[1], $coords[0]],
                ]);
        }
    }

    public function refreshEstablishment()
    {
        $this->establishment = EstablishmentModel::find($this->establishment->id);
    }
}
