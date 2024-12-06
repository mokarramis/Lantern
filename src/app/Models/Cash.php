<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cash extends Model
{
    protected $fillable = [
        'user_id', 'resource', 'amount', 'other'
    ];

    public function transaction()
    {
        return $this->morphOne(Transaction::class, 'transactionable');
    }
}
