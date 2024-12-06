<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'user_id', 'bank', 'name', 'number', 'card_number', 'amount'
    ];

    public function transaction()
    {
        return $this->morphOne(Transaction::class, 'transactionable');
    }
}
