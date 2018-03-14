<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\EconomicData;

class Employee extends Model
{

	protected $fillable = ['nombre', 'edad', 'direccion', 'fecha_nacimiento', 'telefono'];

	public function EconomicData()
	{
		return $this->hasOne('App\EconomicData', 'employee_id');
	}

	public function Knowledges()
	{
		return $this->hasMany('App\Knowledge', 'employee_id');
	}

}
