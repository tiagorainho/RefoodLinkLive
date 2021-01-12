<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Helpers\Location;

class Establishment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'owner_id',
        'name',
        'description',
        'image_url',
        'schedule',
        'address',
        'city',
        'country',
        'coordinates',
        'contact',
    ];

    protected $casts = [
        'coordinates'   => 'array'
    ];

    public function products($search='')
    {
        return Product::where('establishment_id', '=', $this->id)->where('name', 'like', '%'.$search.'%')->orderBy('id','DESC');
    }

    public function availableProducts($search='')
    {
        return Product::where('establishment_id', '=', $this->id)->where('quantity', '>', 0)->where('name', 'like', '%'.$search.'%')->orderBy('id','DESC');
    }

    public function unavailableProducts($search='')
    {
        return Product::where('establishment_id', '=', $this->id)->where('quantity', '=', 0)->where('name', 'like', '%'.$search.'%')->orderBy('id','DESC');
    }

    private function latitude()
    {
        return $this['coordinates'][0];
    }

    private function longitude()
    {
        return $this['coordinates'][1];
    }

    public function distance($coords)
    {
        return Location::distance($this['coordinates'], $coords);
    }

    public function orders()
    {
        return Order::where('establishment_id', '=', $this->id)->orderBy('id', 'DESC');
    }

}
