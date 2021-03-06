<?php

namespace App\Http\Controllers;
use App\Models\Caja;
use App\Models\Diezmo;
use App\Models\Egreso;
use App\Models\Iglesia;
use App\Models\Ingreso;
use App\Models\Ingreso2;
use App\Models\Nomina;
use App\Models\Ofrenda;
use App\Models\OtroIngreso;
use Illuminate\Http\Request;

class Cajas extends Controller
{
    public function index(){
        if(empty(auth()->user())){
            return redirect('/');
        }
        if(auth()->user()->rol==1){
            $diezmos=Diezmo::whereDay('created_at',date('d'))->get();

            $ofrenda=Ofrenda::whereDay('created_at',date('d'))->get();

            $donaciones=Ingreso::whereDay('created_at',date('d'))->get();
            $otros=Ingreso2::whereDay('created_at',date('d'))->get();
            $nomina=Nomina::whereDay('created_at',date('d'))->get();
            $otrosegresos=Egreso::whereDay('created_at',date('d'))->get();
            $caja=Caja::all();

        }else{

        $iglesia=Iglesia::Id()->first();
        $diezmos=Diezmo::where('iglesias_id','=',$iglesia->id)
        ->where('estado','=',true)
        ->whereDay('created_at',date('d'))->get();

        $ofrenda=Ofrenda::where('iglesias_id','=',$iglesia->id)
        ->where('estado','=',true)
        ->whereDay('created_at',date('d'))->get();

        $donaciones=Ingreso::where('iglesias_id','=',$iglesia->id)
        ->where('estado','=',true)
        ->whereDay('created_at',date('d'))->get();
        $otros=Ingreso2::where('iglesias_id','=',$iglesia->id)
        ->where('estado','=',true)
        ->whereDay('created_at',date('d'))->get();
        $nomina=Nomina::where('iglesias_id','=',$iglesia->id)

        ->whereDay('created_at',date('d'))->get();
        $otrosegresos=Egreso::where('iglesias_id','=',$iglesia->id)
        ->where('estado','=',true)
        ->whereDay('created_at',date('d'))->get();
        $caja=Caja::where('iglesias_id','=',$iglesia->id)->get();


        }
      function valor($data,$keys){
          $rest=0;
         foreach($data as $v){
          $rest+=$v->$keys;
         }
         return $rest;
      }

      $totalingreso=0;
      $totalegreso=0;
      foreach($caja as $ca){
          $totalingreso+=$ca->ingreso;
          $totalegreso+=$ca->egreso;
      }
      $totalCaja=$totalingreso-$totalegreso;

        $data=[
          'caja' => $totalCaja,
          'diezmos' => valor($diezmos,'valor'),
          'ofrendas' => valor($ofrenda,'ofrenda'),
          'donaciones' => valor($donaciones,'valor'),
          'nomina' => valor($nomina,'neto'),
          'otros' => valor($otros,'valor'),
          'egreso' => valor($otrosegresos,'valor'),
          'cd' => $diezmos->count(),
          'co' => $ofrenda->count(),
          'ci' => $donaciones->count(),
          'cotros' => $otros->count(),
          'nomina_c' => $nomina->count(),
          'egreso_c' => $otrosegresos->count()
        ];
//return date('h:i');
        return view('admin/caja' , compact('data'));
    }

    public function sendMonth(Request $request){
        if($request->ajax()){
          if(auth()->user()->rol==1){
            $caja=Caja::whereMonth('created_at',$request->data)
            ->get();
          }else{
            $iglesia=Iglesia::Id()->first();
            $caja=Caja::where('iglesias_id','=',$iglesia->id)
            ->whereMonth('created_at',$request->data)
            ->get();
          }

        $rest = "";
         foreach($caja as $c){
         echo '<tr>
          <td>'.date('d',strtotime($c->created_at)).'</td>
          <td><strong class='.'text-primary'.'> $ '.number_format($c->ingreso,0,',','.').'</strong></td>
          <td><strong class='.'text-danger'.'> $ '.number_format($c->egreso,0,',','.') .'</strong></td>
          <td><strong class='.'text-success'.'> $ '.number_format(($c->ingreso - $c->egreso),0,',','.').'</strong></td>
          </tr>';
          }

        }
    }
}
