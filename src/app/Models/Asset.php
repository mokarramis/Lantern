<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'purchase_price', 'purchase_time', 'other'
    ];

    public function getAssetUrlAttribute()
    {
        return env('PREFIX_URL') . '/assets/other';
    }

    public function transaction()
    {
        return $this->morphOne(Transaction::class, 'transactionable');
    }
}
