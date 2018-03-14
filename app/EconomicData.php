<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EconomicData extends Model
{
    protected $table = 'Economic_datas';
    protected $fillable = ['puesto', 'salario'];


    public function employee()
    {
        return $this->belongsTo('App\Employee', 'employee_id');
    }
}
