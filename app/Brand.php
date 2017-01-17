<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
class Brand extends Authenticable
{
    protected $fillable = [
        'restaurant_name', 'url', 'address', 'location', 'phone_one', 'phone_two', 'email', 'password', 'membership', 'description', 'logo', 'cover', 'open_hour',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

}
