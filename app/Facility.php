<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{

	public function brand(){
		$this->belongsTo('App\Brand');
	}
    protected $fillable = [
        'breakfast','wifi','smoking_area','ac','working_environment','reservation','private_room','alcohol','valet','delivery_services','served_pork',
    ];
}
