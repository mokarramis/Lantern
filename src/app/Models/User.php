<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function coins()
    {
        return $this->hasMany(Coin::class);
    }

    public function assets()
    {
        return $this->hasMany(Asset::class);
    }

    public function golds()
    {
        return $this->hasMany(Gold::class);
    }

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    public function cashes()
    {
        return $this->hasMany(Cash::class);
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    public function getSignupUrlAttribute()
    {
        return env('PREFIX_URL') . '/auth/sign-up';
    }

    public function getLoginUrlAttribute()
    {
        return env('PREFIX_URL') . '/auth/login';
    }
}
