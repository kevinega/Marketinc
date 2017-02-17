<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

		public $incrementing = false;
     	public function brand(){
     		return $this->belongsTo('App\Brand');
     	}
}
