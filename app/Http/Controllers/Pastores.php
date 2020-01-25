<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pastor;
use App\User;

class Pastores extends Controller
{

    public function index(){

       // return view('pastores', compact('datos'));
    }

    public function crearPastor(Request $request){

      if(!empty(auth()->user())){
          if( Pastor::create([
               'nombre' => ucwords($request->nombre),
               'apellido' => ucwords($request->apellido),
               'identificacion' => $request->cc,
               'genero' => $request->genero,
               'edad' => $request->edad,
               'fecha_nacimiento'=>$request->fecha,
                'etnia' => $request->etnia,
                'casado' => $request->casado,
                'num_hijos' => $request->hijos,
                'email' => $request->email,
                'direccion' => $request->direccion,
                'pais' => $request->pais,
                'departamento' => $request->departamento,
                'municipio' => ucfirst($request->municipio),
                'descripcion' => $request->descripcion,
                'arl' => $request->arl,
                'afp' => $request->afp,
                'eps'=> $request->eps
           ])){
                User::create([
                    'nombre' => $request->nombre,
                    'apellido' => $request->apellido,
                    'rol' => 3,
                    'logo' => 'logo.png',
                    'email' => $request->email,
                    'password' => crypt('pastor123','$2a$07$usesomesillystringforsalt$')
                ]);

                return redirect()->route('pastores');
           }
      }else{
          redirect('/');
      }
    }

    public function crearPastorView(){
        return view('admin/pastor_crear');
    }
}
