<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Iglesia;
use App\Models\Miembro;

class Miembros extends Controller
{

    public function index(){
           $iglesia=Iglesia::where('email','=',auth()->user()->email)->first();
           $miembros=Miembro::where('iglesias_id','=',$iglesia->id)->get();
           $data=['miembros'=>$miembros];

           return view('iglesia/miembros',compact('data'));
    }

    public function crearMiembroView(){
       if(!empty(auth()->user())){

        return view('admin/miembro_crear');

        }else{
            return redirect('/');
        }



    }

    public function crearMiembro(Request $request){
        if(!empty(auth()->user())){
            $iglesia=Iglesia::where('email','=',auth()->user()->email)->first();
            if( Miembro::create([
                'iglesias_id' => $iglesia->id,
                'nombres' => ucwords($request->nombre),
                'apellidos' => ucwords($request->apellido),
                'identificacion' => $request->cc,
                'genero' => $request->genero,
                'edad' => $request->edad,
                'fecha_nacimiento'=>$request->fecha,
                'estado_civil' => $request->estado_civil,
                 'etnia' => $request->etnia,
                 'diezma' => $request->diezma,
                 'casado' => $request->casado,
                 'num_hijos' => $request->hijos,
                 'email' => $request->email,
                 'direccion' => $request->direccion,
                 'pais' => $request->pais,
                 'departamento' => $request->departamento,
                 'municipio' => ucwords($request->municipio),
                 'descripcion' => $request->descripcion,
                 'estado' => $request->estado,
                 'empleado' => $request->empleado,
                 'estrato' => $request->estrato,
                 'discapasida'=> $request->discapacidad

            ])){
           return redirect()->back()->with('success','Los datos se registraron correctamente!');
            }
            }else{
              return view('errors/404');
            }
    }
}
