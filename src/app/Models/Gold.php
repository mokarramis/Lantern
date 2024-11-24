<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gold extends Model
{
    protected $fillable = [
        'user_id', 'carat', 'weight', 'purchase_price', 'purchase_time', 'other'
    ];
}
