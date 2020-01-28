<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Distrito;

class Distritos extends Controller
{
   public function index(){
     $distritos=Distrito::all();
     $datos=[
         'distrito' => $distritos
     ];
   return view('distritos',compact('datos'));
   }

   public function distritoView(){
    if (!empty(auth()->user()) && auth()->user()->rol==1) {
        return view('admin/distrito_crear');
    }else{
        return view('errors/404');
    }
   }

   public function distritoCrear(Request $request){
   if(Distrito::create([
        'nombre' => $request->nombre,
        'coordinador_id' => $request->coordinador
    ])){
        echo "Datos insertados";
    }else{
        echo "datos no insertados :-(";
    }

   }

   public function distritoUpdate(Request $request, $id){

    $update=Distrito::find($id);
    $update->nombre=$request->nombre;
    $update->coordinador_id=$request->coordinador;
    $update->save();
   }

   public function distritoDrop($id){
    if(Distrito::destroy($id)){
        return 1;
    }else{
        return 0;
    }
   }



}
