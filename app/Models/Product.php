<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'establishment_id',
        'name',
        'description',
        'normal_price',
        'price',
        'quantity',
        'image_url',
    ];
    
    public function updatedAt()
    {
        $changes = [
            'ago'       => '',
            'second'    => 'segundo',
            'minute'    => 'minuto',
            'hour'      => 'hora',
            'day'       => 'dia',
        ];
        $string = $this->updated_at->diffForHumans();
        foreach(array_keys($changes) as $change) $string = str_replace($change, $changes[$change], $string);
        return $string;
    }

}
