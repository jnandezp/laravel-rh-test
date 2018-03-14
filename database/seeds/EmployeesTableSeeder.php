<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();
    	for ($i=0; $i < 50; $i++) {
    		$employee = \DB::table('employees')->insertGetId(array(
    			'nombre' => $faker->name,
    			'direccion'  => $faker->address,
    			'fecha_nacimiento' => $faker->dateTimeBetween('-30 years', '-5 years', null),
    			'telefono' => '222110'.rand(1000,9999),
    			'edad' => rand(20,40),
    			'estado' => 1,
    			'created_at' => date('Y-m-d H:m:s'),
    			'updated_at' => date('Y-m-d H:m:s')
    		));


    		$economicData = \DB::table('economic_datas')->insertGetId(array(
    			'employee_id' => $employee,
    			'puesto'  => $faker->randomElement(['desarrollador','developer','diseñador','mercadologo','administrador']),
    			'salario' => rand(7000, 10000),
    			'created_at' => date('Y-m-d H:m:s'),
    			'updated_at' => date('Y-m-d H:m:s')
    		));



    		$lenguaje = ['php', 'python', 'ruby'];
    		for ($k=0; $k < count($lenguaje); $k++) {
    			$language = \DB::table('languages')->insertGetId(array(
    				'lenguaje' => $lenguaje[$k],
    				'created_at' => date('Y-m-d H:m:s'),
    				'updated_at' => date('Y-m-d H:m:s')
    			));


    			$knowledge = \DB::table('knowledges')->insertGetId(array(
    				'employee_id' => $employee,
    				'language_id'  => $language,
    				'porcentaje' => rand(1, 100),
    				'created_at' => date('Y-m-d H:m:s'),
    				'updated_at' => date('Y-m-d H:m:s')
    			));
    		}
    	}
    }
}

