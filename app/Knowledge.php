<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Knowledge extends Model
{
	protected $table = 'Knowledges';

    public function Employee()
    {
        return $this->belongsTo('App\Employee');
    }


    public function Language()
    {
        return $this->belongsTo('App\Language','language_id');
    }
}
