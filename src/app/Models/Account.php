<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'bank', 'name', 'number', 'card_number', 'amount'
    ];
}
