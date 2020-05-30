<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Iglesia;
use Illuminate\Http\Request;

class Empleados extends Controller
{
    public function index(){
        if(empty(auth()->user())){
            return redirect('/');
        }
        $iglesia=Iglesia::Id()->first();
        $empleados=Empleado::where('iglesias_id','=',$iglesia->id)->get();

        return view('iglesia/empleados',compact('empleados'));

    }

    public function createView(){

        return view('iglesia/crear_empleado');
    }

    public function createSet(Request $request){

        if(empty($request->contrato)){
            $fileName="";
        }else{
            $file=$request->file('contrato');
            $fileName=date('d-m-y-s-i') . $file->getClientOriginalName();
        }
$iglesia=Iglesia::Id()->first();
        if(Empleado::create([
            'iglesias_id' => $iglesia->id,
            'nombre' => ucwords($request->nombre),
            'apellido' => ucwords($request->apellido),
            'identificacion' => $request->cc,
            'telefono' => $request->telefono,
            'ciudad' => ucwords($request->ciudad),
            'direccion' => ucfirst($request->direccion),
            'email' => $request->email,
            'jefe' => $request->jefe,
            'tipo_contrato' => $request->tipo,
            'salario' => $request->salario,
            'fecha_ingreso' => $request->fecha_inicio,
            'fecha_final' => $request->fecha_final,
            'periodo_pago' => $request->periodo,
            'soporte' => $fileName
        ])){
       if(!empty($request->contrato)){
          $file->move(public_path().'/assets/iglesia/'.str_replace(" ","-",$iglesia->nombre).'/soportes/empleados/',$fileName);
       }

       return redirect()->back()->with('success','Se realizo el registro con éxito');
        }
    }

    public function empleadoView($id){
        if(empty(auth()->user())){
            return redirect('/');
        }

        $empleado=Empleado::where('identificacion','=',$id)->first();
        return view('iglesia/empleado_view',compact('empleado'));
    }
}
