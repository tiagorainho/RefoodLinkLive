<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    public const RANK_CONSUMER = 0;
    public const RANK_SELLER   = 5;
    public const RANK_ADMIN    = 10;

    use HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'type',
        'favorite_establishments',
        'nif',
        'swift',
        'bank',
        'holder',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at'         => 'datetime',
        'favorite_establishments'   => 'array'
    ];

    public function establishments() {
        return Establishment::where('owner_id', '=', $this->id)->orderBy('id','DESC')->get();
    }

    public function addFavoriteEstablishment($id) {
        $favorites = $this->favorite_establishments;
        if(!in_array($id, $favorites)) {
            array_push($favorites, $id);
            $this->favorite_establishments = $favorites;
            $this->save();
            return true;
        }
        return false;
    }

    public function removeFavoriteEstablishment($id) {
        $favorites = $this->favorite_establishments;
        if (($key = array_search($id, $favorites)) !== false) {
            $this->favorite_establishments = array_diff($favorites, [$id]);
            $this->save();
            return true;
        }
        return false;
    }

    public function favorites() {
        $favorites = $this->favorite_establishments;
        return Establishment::whereIn('id', $favorites);
    }

    public function notFavorites() {
        return Establishment::whereNotIn('id', $this->favorite_establishments);
    }

    public function isConsumer() {
        return $this->type == $this::RANK_CONSUMER;
    }

    public function isSeller() {
        return $this->type == $this::RANK_SELLER;
    }

    public function isAdmin() {
        return $this->type == $this::RANK_ADMIN;
    }

}
