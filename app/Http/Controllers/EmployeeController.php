<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\EconomicData;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // echo 'HERE';
        $employees = Employee::all();
        foreach ($employees as $employee) {
            $employee->EconomicData;
        }

        return response()->json($employees,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->isMethod('post')) {
            $empleado = new Employee;
            $empleado->nombre = $request->input('nombre');
            $empleado->telefono = $request->input('telefono');
            $empleado->direccion = $request->input('direccion');
            list($dia, $mes, $anno) = explode("/",$request->input('fechaNacimiento'));
            $empleado->fecha_nacimiento = "$anno-$mes-$dia 00:00:00";
            $empleado->estado = 1;
            $empleado->edad = 0;

            // try {
            //     $cumpleanos = new \DateTime((string)$request->input('fechaNacimiento'));
            //     $today = new \DateTime();
            //     $interval  = $today->diff($cumpleanos);
            //     $empleado->edad = $interval->y;    
            // } catch (Exception $e) {}

            $empleado->save();

            $economicData = new EconomicData;
            $economicData->employee_id = $empleado->id;
            $economicData->salario = $request->input('salario');
            $economicData->puesto = $request->input('puesto');
            $economicData->save();

            return $empleado;
        }
        

        return response()->json(null,401);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        if ($request->isMethod('post')) {
            $id = $request->input('id');

            $employee = Employee::find($id);
            $employee->EconomicData;
            $conocimientos = $employee->Knowledges;
            foreach ($conocimientos as $conocimiento) {
                $conocimiento->Language;
            }

            $mysqldate = strtotime( $employee->fecha_nacimiento );
            $employee->fecha_nacimiento = date( 'd/m/Y', $mysqldate );
             

            return response()->json($employee, 200);
        }

        return response()->json(null,401);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->isMethod('put')) {
            $idUsuario = $request->input('id');
            $empleado = Employee::find($request->input('id'));
            $empleado->nombre = $request->input('nombre');
            $empleado->telefono = $request->input('telefono');
            $empleado->direccion = $request->input('direccion');
            list($dia, $mes, $anno) = explode("/",$request->input('fechaNacimiento'));
            $empleado->fecha_nacimiento = "$anno-$mes-$dia 00:00:00";



            // $empleado->estado = 1;
            // $empleado->edad = 0;
            // 
            // try {
            //     $cumpleanos = new \DateTime((string)$request->input('fechaNacimiento'));
            //     $today = new \DateTime();
            //     $interval  = $today->diff($cumpleanos);
            //     $empleado->edad = $interval->y;    
            // } catch (Exception $e) {}

            $empleado->save();

            $economicData = EconomicData::where('employee_id', (int)$idUsuario)->first();

            // $economicData->employee_id = $empleado->id;
            $economicData->salario = $request->input('salario');
            $economicData->puesto = $request->input('puesto');
            $economicData->save();


            return $empleado;
        }
        

        return response()->json(null,401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
