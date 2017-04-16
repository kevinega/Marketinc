<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticable;
use App\Notifications\MarketincResetPassword as ResetPasswordNotification;

class Brand extends Authenticable
{

	use Notifiable;

    protected $fillable = [
        'id','brand_name', 'username', 'address', 'phone_one', 'phone_two', 'email', 'password', 'membership', 'description', 'logo', 'cover', 'open_hour', 'verified', 'confirmation_code', 'valid_until', 'music',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function transaction(){
    	return $this->hasMany('App\Transaction');
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

}
