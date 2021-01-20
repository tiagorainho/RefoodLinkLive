<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Establishment;
use App\Models\User;
use App\Helpers\Location;

class Search extends Component
{
    public $favorites, $all_favorites = [];
    public $not_favorites, $all_not_favorites = [];
    public $user;

    public $max_number_of_favorite_products = 4;
    public $max_number_of_not_favorite_products = 20;
    public $max_distance_config = 20;

    // search variables
    public $max_distance_from_user_in_kms;
    public $search;
    protected $queryString = ['search'];

    // auxiliars
    public $cancel_next_click = false;
    public $user_coords = null;
    public $user_coords_unavailable = false;
    public $is_loading = true;

    public function render()
    {
        return view('pages.search');
    }

    protected function getListeners()
    {
        return [
            'start_populateEvent'           => '$refresh',
            'returnCoordinates'             => 'refreshCoordinates',
            'refreshMaxRadius'              => 'refreshEstablishments',
            'refreshEstablishmentSearch'    => 'refreshEstablishments',
        ];
    }

    public function refreshEstablishments($distance_in_km=null, $searchString='')
    {
        if(!isset($searchString)) $searchString = '';
        $this->is_loading = true;
        $this->search = $searchString;

        if($distance_in_km == null) $distance_in_km=$this->user->distance/1000;
        $this->max_distance_from_user_in_kms = $distance_in_km;

        // filter collections
        $this->favorites = Location::get_in_range($this->all_favorites, $this->user_coords, $distance_in_km)
            ->filter(function ($val, $key) use ($searchString) {
                return str_contains(strtolower($val->name), strtolower($searchString));
            });

        $this->not_favorites = Location::get_in_range($this->all_not_favorites, $this->user_coords, $distance_in_km)
            ->filter(function ($val, $key) use ($searchString) {
                return str_contains(strtolower($val->name), strtolower($searchString));
            });

        $this->is_loading = false;
    }

    public function mount()
    {
        $this->user = Auth()->user();
        $this->max_distance_from_user_in_kms = $this->user->distance/1000;
    }

    public function start_populate()
    {
        if(!$this->user_coords_unavailable) {
            $this->dispatchBrowserEvent('getCoordinates');
        }
    }

    public function refreshCoordinates($latitude, $longitude)
    {
        $this->user_coords = [$latitude, $longitude];
        $this->populate();
    }

    public function populate()
    {
        $this->is_loading = true;
        if($this->user_coords != null) {

            // favorites
            $this->all_favorites = $this->user->favorites()->where('coordinates', '!=', null)->get();
            $this->all_favorites = Location::get_in_range($this->all_favorites, $this->user_coords, $this->max_distance_config)->shuffle();

            // others
            $this->all_not_favorites = $this->user->notFavorites()->where('coordinates', '!=', null)->get();
            $this->all_not_favorites = Location::get_in_range($this->all_not_favorites, $this->user_coords, $this->max_distance_config)->shuffle();

            $this->refreshEstablishments($this->max_distance_from_user_in_kms, $this->search);
        }
        else{
            $this->user_coords_unavailable = true;
        }
        $this->is_loading = false;
    }

    public function goto($path)
    {
        if(!$this->cancel_next_click)
            return redirect($path);
        $this->cancel_next_click = false;
    }

    public function addFavorite($id)
    {
        $this->cancel_next_click = true;
        $establishment = $this->getEstablishment($this->not_favorites, $id);
        if($establishment != null) {
            $this->user->addFavoriteEstablishment($id);
            $this->all_favorites->prepend($establishment);
            $this->all_not_favorites = $this->all_not_favorites->where('id', '!=', $id);
        }
        $this->refreshEstablishments($this->user->distance, $this->search);
    }

    public function removeFavorite($id)
    {
        $this->cancel_next_click = true;
        $establishment = $this->getEstablishment($this->favorites, $id);
        if($establishment != null) {
            $this->user->removeFavoriteEstablishment($id);
            $this->all_not_favorites->prepend($establishment);
            $this->all_favorites = $this->all_favorites->where('id', '!=', $id);
        }
        $this->refreshEstablishments($this->user->distance, $this->search);
    }

    public function getEstablishment($array, $id)
    {
        foreach($array as $establishment) {
            if($establishment->id == $id) {
                return $establishment;
            }
        }
        return null;
    }
}
