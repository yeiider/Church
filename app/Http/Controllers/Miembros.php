<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Iglesia;
use App\Models\Miembro;

class Miembros extends Controller
{

    public function index(){
        if(empty(auth()->user())){
            return redirect('/');
        }


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
                'nombres' => ucwords(trim($request->nombre)),
                'apellidos' => ucwords(trim($request->apellido)),
                'identificacion' => $request->cc,
                'genero' => $request->genero,
                'edad' => $request->edad,
                'fecha_nacimiento'=>date('d-m-Y',strtotime($request->fecha)),
                'estado_civil' => $request->estado_civil,
                 'etnia' => $request->etnia,
                 'diezma' => $request->diezma,
                 'casado' => $request->casado,
                 'num_hijos' => $request->hijos,
                 'email' => $request->email,
                 'direccion' => $request->direccion,
                 'telefono' => $request->telefono,
                 'pais' => $request->pais,
                 'fecha_inicio'=> date('d-m-Y',strtotime($request->fecha_inicio)),
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

    public function perfil($id){
          if(empty(auth()->user())){
            return redirect('/');
          }

          $iglesia=Iglesia::where('email','=',auth()->user()->email)->first();
          $miembro=Miembro::where('iglesias_id','=',$iglesia->id)
          ->where('id','=',$id)->first();

          return view('admin/perfil_miembros',compact('miembro'));

    }

    public function update(Request $request){

         $setUp=Miembro::find($request->id);
         $setUp->nombres=$request->nombres;
         $setUp->apellidos=$request->apellidos;
         $setUp->identificacion=$request->cc;
         $setUp->edad=$request->edad;
         $setUp->fecha_nacimiento=$request->fecha;
         $setUp->num_hijos=$request->hijos;
         $setUp->estado_civil=$request->civil;
         $setUp->email=$request->email;
         $setUp->telefono=$request->telefono;
         $setUp->municipio=$request->municipio;
         $setUp->estrato=$request->estrato;
         $setUp->discapasida=$request->discapacidad;
         $setUp->empleado=$request->empleado;
         $setUp->diezma=$request->diezma;
         $setUp->fecha_inicio=$request->fecha_inicio;
         if($setUp->save()){
             return redirect()->back()->with('success','Se actualizaron los datos correctamente!');
         }

    }

    public function drop($id){
        if (Miembro::destroy($id)) {
            return redirect('/Miembros')->with('success', 'Se elimino el el dato correctamente');
        }
    }

}
