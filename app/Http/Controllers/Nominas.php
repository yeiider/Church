<?php

namespace App\Http\Controllers;

use App\Models\Caja;
use App\Models\Empleado;
use App\Models\Iglesia;
use App\Models\Nomina;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class Nominas extends Controller
{
    public function index(){
        $iglesia=Iglesia::Id()->first();
        $nominas=Nomina::where('iglesias_id','=',$iglesia->id)->get();
        return view('iglesia/nominas',compact('nominas'));
    }

    public function generarNomina($id){

        $iglesia=Iglesia::Id()->first();
        $caja=Caja::where('iglesias_id','=',$iglesia->id)->get();

        $totalingreso=0;
        $totalegreso=0;
        foreach($caja as $ca){
            $totalingreso+=$ca->ingreso;
            $totalegreso+=$ca->egreso;
        }
        $totalCaja=$totalingreso-$totalegreso;

        $empleado=Empleado::find($id);
        switch($empleado->periodo_pago){
        case 1:
        $dias=30;
        break;
        case 2:
        $dias=15;
        break;
        case 3:
        $dias=8;
        break;
      }
      $basico=(($empleado->salario)/30)*$dias;
      $aux=(102854/30)*$dias;
      $salud=($basico*0.04);
      $pension=($basico*0.04);
      $neto = ($basico+$aux)-($salud+$pension);

      if($neto>$totalCaja){
          return redirect('/Informe/Caja')->with('error','No hay fondos suficientes para generar esta nomina');
      }
      if(Nomina::create([
       'iglesias_id' => $iglesia->id,
       'empleados_id' => $empleado->id,
       'dias' => $dias,
       'basico' => $basico,
       'aux_transporte' => $aux,
       'total_devengado' => $basico+$aux,
       'salud' => $salud,
       'pension' => $pension,
       'total_deducciones' => $salud+$pension,
       'neto' => $neto,
       'codigo' => str::random(20),
       'elaborado' => auth()->user()->nombre .' '. auth()->user()->apellido
      ])){
        return redirect()->back()->with('success','Nomina Generada');
      }
      }

    public function nomiaViewPdf($id){

        if(empty(auth()->user())){
            return redirect('/');
        }
        $iglesia=Iglesia::Id()->first();

        $nomina=Nomina::find($id);
      if($iglesia->id==$nomina->iglesias_id){
       $pdf=\PDF::loadView('pdf.nominapdf',compact('nomina'))->setPaper("a5","landscape");

        //return \PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('pdf.nominapdf',compact('nomina'))->stream('nomina.pdf');
       return $pdf->stream('nomina.pdf');
      }else{
          return view('errors/404');
      }

    }

}
