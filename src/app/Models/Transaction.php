<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Transaction extends Model
{
    protected $fillable = [
        'id', 'transactionable_id', 'user_id', 'transactionable_type', 'category', 'price', 'time', 'description'
    ];

    const CATEGORY = ['paid', 'received'];

    public function transactionable(): MorphTo
    {
        return $this->morphTo();
    }
}
