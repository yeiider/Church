<?php

namespace App\Http\Controllers;
use App\Models\Caja;
use App\Models\Iglesia;
use Illuminate\Http\Request;

class Cajas extends Controller
{
    public function index(){
        $mesall=['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Obtubre','Noviembre','Diciembre'];

        if(auth()->user()->rol==1){
          $caja=Caja::all();
        }else{

       $iglesia=Iglesia::where('email','=',auth()->user()->email)->first();
       $caja=Caja::where('iglesias_id','=',$iglesia->id)->get();
        }
       $caja=Caja::where('iglesias_id','=',$iglesia->id)
       ->whereMonth('created_at',date('m'))
       ->get();


        $data=[
            'meses' => $mesall,
            'caja' => $caja
        ];
        return view('admin/caja' , compact('data'));
    }
}
