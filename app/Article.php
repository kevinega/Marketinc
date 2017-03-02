<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
		public $incrementing = false;
     	public function brand(){
     		return $this->belongsTo('App\Brand');
     	}
}
