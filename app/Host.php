<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Host extends Model
{
	protected $with =['user'];
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
