<?php

namespace App\Http\Controllers;
use App\Models\Diezmo;
use App\Models\Iglesia;
use App\Models\Ofrenda;
use App\Models\Caja;
use App\Models\Ingreso;
use Illuminate\Http\Request;

class Ingresos extends Controller
{
    public function index(Request $request){
        $mesall=['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Obtubre','Noviembre','Diciembre'];
        $mes1=['Enero','Febrero','Marzo','Abril','Mayo','Junio'];
        $mes2=['Julio','Agosto','Septiembre','Obtubre','Noviembre','Diciembre'];
        $md=[];
        $mo=[];
        $mi=[];
        $vo=[0,0,0,0,0,0,0,0,0,0,0,0];
        $vd=[0,0,0,0,0,0,0,0,0,0,0,0];
        $vi=[0,0,0,0,0,0,0,0,0,0,0,0];



        if(auth()->user()->roll==1){

        }else{
          $iglesia=Iglesia::where('email','=',auth()->user()->email)->first();
          for($i=0;$i<=12-1;$i++){
           $ss=$mesall[$i];
           $k=Diezmo::where('iglesias_id','=',$iglesia->id)->$ss()->get();
           $q=Ofrenda::where('iglesias_id','=',$iglesia->id)->$ss()->get();
           $v=Ingreso::where('iglesias_id','=',$iglesia->id)->$ss()->get();
            $s=0;
           foreach($k as $md){$vd[$s]+=$md->valor;}foreach($q as $md){$vo[$s]+=$md->ofrenda;}foreach($v as $md){$vi[$s]+=$md->valor;}
           $s++;
          }

        }
        $mesesent=[];$valord=[];$valoro=[];$valori=[];
     for($i=0;$i<=date('m');$i++){
        $mesesent[$i]=$mesall[$i];
        $valord[$i]=$vd[$i];
        $valoro[$i]=$vo[$i];
        $valori[$i]=$vi[$i];
     }

     $labels=[];
        $data=[
        'labels'=> $mesesent,
        'datasets' => array(['label' => 'Diezmos','backgroundColor'=>'#26B99A','data' => $valord],
                            ['label' => 'Ofrendas','backgroundColor' => '#03586A','data' => $valoro],
                            ['label' => 'Otros','backgroundColor' => '#17B6B4','data' => $valori]
                            )
        ];

    return view('iglesia/ingresos',compact('data'));
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
            Caja::create([
                'iglesias_id' => $iglesia->id,
                'ingreso' => $request->ofrenda,
                'egreso' => 0
            ]);
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
        'fecha' => date('d-m-Y',strtotime($request->fecha)),
        'motivo' => $request->motivo,
        'valor' => $request->valor
      ])){
        Caja::create([
            'iglesias_id' => $iglesia->id,
            'ingreso' => $request->valor,
            'egreso' => 0
        ]);
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
}
