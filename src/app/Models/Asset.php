<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $guarded = [
        'user_id', 'name', 'purchase_price', 'purchase_time', 'other'
    ];
}
