<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    public const PENDING    = 0;
    public const PAYED      = 5;
    public const CANCELED   = 10;

    protected $fillable = [
        'random_id',
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

    public function isPending() {
        return $this->state == $this::PENDING;
    }

    public function isPayed() {
        return $this->state == $this::PAYED;
    }

    public function isCanceled() {
        return $this->state == $this::CANCELED;
    }
}
