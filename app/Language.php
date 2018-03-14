<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
	protected $table = 'Languages';

    public function Knowledge()
	{
		return $this->hasOne('App\Knowledge', 'id');
	}
}
