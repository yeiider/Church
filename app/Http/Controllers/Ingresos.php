<?php

namespace App\Http\Controllers;
use App\Models\Diezmo;
use App\Models\Iglesia;
use App\Models\Ofrenda;
use App\Models\Ingreso;
use Illuminate\Http\Request;

class Ingresos extends Controller
{
    public function index(){

    }

    public function ofrenda(){
        if(empty(auth()->user())){
            return view('errors/404');
        }
        $iglesia=Iglesia::where('email','=',auth()->user()->email)->first();
        $ofrendas=Ofrenda::where('iglesias_id','=',$iglesia->id)->get();

        return view('iglesia/ofrenda',compact('ofrendas'));
    }

    public function setOfrenda(Request $request){

        if(empty(auth()->user())){
           return view('errors/404');
        }
    $iglesia= Iglesia::where('email','=',auth()->user()->email)->first();
       if(Ofrenda::create([
           'iglesias_id' =>$iglesia->id,
           'ofrenda' => $request->ofrenda,
           'nota' => $request->nota,
           'fecha' => date('d-m-Y',strtotime($request->fecha)),
           'tipo_ofrenda' => $request->tipo
        ])){
     return redirect()->back()->with('success','Se registro la ofrenda correctamente');
        }else{
            return redirect()->with('error','Error inesperado intente de nuevo mas tarde');
        }
    }
}
