<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function scopeThisMonth($query)
    {
        return $query->whereMonth('created_at', Carbon::now()->month);
    }
}
