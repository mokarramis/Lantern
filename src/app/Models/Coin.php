<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    protected $fillable = [
        'user_id', 'type', 'quantity', 'purchase_price', 'purchase_time', 'other'
    ];

    const type = ['bahar','emami','nim','rob','gerami'];

    public function transaction()
    {
        return $this->morphOne(Transaction::class, 'transactionable');
    }
}
