<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'buyer_id',
        'product_id',
        'establishment_id',
        'quantity',
        'price',
        'use_delivery_man',
    ];

    public function product() {
        return User::find($this->product_id);
    }
    
    public function seller() {
        return User::find($this->owner_id);
    }
}
