<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticable;

class Brand extends Authenticable
{

	use Notifiable;

    protected $fillable = [
        'brand_name', 'username', 'address', 'phone_one', 'phone_two', 'email', 'password', 'membership', 'description', 'logo', 'cover', 'open_hour', 'confirmed', 'confirmation_code', 'music',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

}
