<?php

namespace App\Http\Controllers;
use App\Models\Diezmo;
use App\Models\Iglesia;
use App\Models\Ofrenda;
use App\Models\Caja;
use App\Models\Cuenta;
use App\Models\Ingreso;
use App\Models\Ingreso2;
use App\Models\OtroIngreso;
use App\Models\TipoIngreso;
use Illuminate\Http\Request;

class Ingresos extends Controller
{

    public function index(Request $request){
        if(empty(auth()->user())){
            return redirect('/');
        }

    return view('iglesia/ingresos');
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
           'tipo_ofrenda' => $request->tipo
        ])){
    switch($request->tipo){
       case '41709502':
       $cuenta=Cuenta::where('cuenta','=','41709502')->first();
       $cuenta->credito+=$request->ofrenda;
       $cuenta->save();
        break;
        case '41709503':
        $cuenta=Cuenta::where('cuenta','=','41709503')->first();
        $cuenta->credito+=$request->ofrenda;
        $cuenta->save();
        break;
        case '41709504':
        $cuenta=Cuenta::where('cuenta','=','41709504')->first();
        $cuenta->credito+=$request->ofrenda;
        $cuenta->save();
        break;
        case '42950503':
        $cuenta=Cuenta::where('cuenta','=','42950503')->first();
        $cuenta->credito+=$request->ofrenda;
        $cuenta->save();
        break;
    }
     return redirect()->back()->with('success','Se registro la ofrenda correctamente');
        }else{
            return redirect()->with('error','Error inesperado intente de nuevo mas tarde');
        }
    }

    public function donaciones(){
        if(empty(auth()->user())){
            return view('errors/404');
        }
      $iglesia=Iglesia::where('email','=',auth()->user()->email)->first();
      $donaciones=Ingreso::where('iglesias_id','=',$iglesia->id)->get();
      return view('iglesia/donaciones',compact('donaciones'));
    }

    public function createDonacion(Request $request){
        if(empty(auth()->user())){
            return view('errors/404');
        }
        $iglesia=Iglesia::where('email','=',auth()->user()->email)->first();
      if(Ingreso::create([
        'iglesias_id' => $iglesia->id,
        'nombre' => ucwords($request->nombre),
        'apellido' => ucwords($request->apellido),
        'identificacion' => $request->cc,
        'razon_social' => ucwords($request->razon),
        'nit' => $request->nit,
        'email' => $request->email,
        'ciudad' => ucwords($request->ciudad),
        'direccion' => ucwords($request->direccion),
        'telefono' => $request->telefono,
        'motivo' => $request->motivo,
        'valor' => $request->valor
      ])){

         return redirect()->back()->with('success','Se registraron los datos correctamente');
      }else{
        return redirect()->back()->with('error','Ocurrio un error inesperado intente mas tarde!');
      }

    }

    public function updateDonacion(Request $request){
     $d=Ingreso::find($request->id);
     $d->nombre=ucwords($request->nombre);
     $d->apellido=ucwords($request->apellido);
     $d->identificacion=$request->cc;
     $d->nit=$request->nit;
     $d->razon_social=$request->razon;
     $d->telefono=$request->telefono;
     $d->motivo=$request->nota;
     $d->direccion=$request->direccion;
     $d->ciudad=$request->ciudad;
     $d->email=$request->email;

     if($d->save()){
         return redirect()->back()->with('success','Se actualizaron los datos correctamente');
     }else{
         return redirect()->back()->with('error','Error inesperado por favor intente mas tarde');
     }
    }

    public function otrosIngresos(){
        if(empty(auth()->user())){
            return redirect('/');
        }
        if(auth()->user()->rol==1){
            $ingresos=Ingreso2::all();
        }else{
            $iglesia=Iglesia::Id()->first();
            $ingresos=Ingreso2::where('iglesias_id', '=', $iglesia->id)->get();

        }
        $cuenta=Cuenta::where('cuenta', 'LIKE', '4%')
        ->get();
        $data=[
         'cuentas' => $cuenta,
         'ingresos' => $ingresos
        ];

        return view('iglesia/otros_ingresos',compact('data'));
    }

    public function donacionesEstado($id){
      $donacion=Ingreso::find($id);
      if($donacion->estado){
        $donacion->estado=false;
      }else{
       $donacion->estado=true;
      }

      $donacion->save();
      return redirect()->back();
    }

    public function dropDiezmo($id){
      Diezmo::destroy($id);
      return redirect()->back();
    }

    public function tipoIngreso(){
        $tipo=TipoIngreso::all();
        return view('admin/tipo_ingreso',compact('tipo'));
    }

    public function tipoCreate(Request $request){
        if(tipoIngreso::create([
            'codigo' => $request->codigo,
            'nombre' => $request->nombre
        ])){
            return redirect()->back()->with('success','Se registro el ingreso correctamente');
        };
    }

    public function createOtroIngreso(Request $request){
        $iglesia=Iglesia::Id()->first();

     if($tros=Ingreso2::create([
          'iglesias_id' =>  $iglesia->id,
          'cuentas_id' => $request->tipo,
          'valor' => $request->valor,
      ])){
          return redirect()->back();
      }
    }

    public function cambiarEstado($id){
        $ingreso=Ingreso2::find($id);
        if($ingreso->estado){
          $ingreso->estado=false;
        }else{
         $ingreso->estado=true;
        }

        $ingreso->save();
        return redirect()->back();
    }
}
