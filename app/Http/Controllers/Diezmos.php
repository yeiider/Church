<?php

namespace App\Http\Controllers;
use App\Models\Miembro;
use App\Models\Iglesia;
use App\Models\Diezmo;
use App\Models\Caja;
use Illuminate\Http\Request;

class Diezmos extends Controller
{

    public function index(){

    }

    public function ingresar(){
if(empty(auth()->user()))
return view('../errors/404');
        $i=Iglesia::where('email','=',auth()->user()->email)->first();
        $miembros=Miembro::where('iglesias_id','=',$i->id)
        ->where('diezma','=',true)
        ->get();

        $diezmos=Diezmo::where('iglesias_id','=',$i->id)
        ->whereDay('created_at',date('d'))
        ->get();

        $data=[
            'miembros' => $miembros,
            'diezmos' => $diezmos
        ];


        return view('iglesia/diezmo_add',compact('data'));
    }

    public function buscarDiezmante(Request $request){
        if ($request->ajax()) {
            $id=Iglesia::where('email', '=', auth()->user()->email)->first();
            $data=explode('  ', $request->data);
            $m=Miembro::where('iglesias_id', '=', $id->id)
           ->where('nombres', '=', $data[0])
           ->where('apellidos', '=',$data[1])
           ->where('diezma','=',true)
           ->first();





            return response()->json("<div class='dropdown-divider'></div>
             <h5>Documento: $m->identificacion</h5>
             <div class='dropdown-divider'></div>
             <h5>Direccion: $m->direccion</h5>
             <div class='dropdown-divider'></div>
             <h5>Telefono: $m->telefono</h5>
             <div class='dropdown-divider'></div>
             <h5>Fecha de nacimiento: $m->fecha_nacimiento</h5>



             <input type='hidden' name='id' value='$m->id'>

             <div class='form-group row'>
             <label class='col-form-label col-md-4 col-sm-4 label-align' for='diezmo'><h5>Valor $</h5><span class='required'>*</span>
             </label>
             <div class='col-md-6 col-sm-6'>
             <input type='text' id='diezmo' name='diezmo' required='required' class='form-control ' />
             </div>
           </div>
           <div class='form-group row'>
          <input type='submit' value='Registrar' name='enviar' class='btn btn-success form-control'>
           </div>
         </div>

             ");
        }
    }

    public function registrar(Request $request){
        if($request->id==null)
           return redirect()->back();
        $id_ig=Iglesia::where('email' , '=' , auth()->user()->email)->first();


        $v=Diezmo::where('id','=',$request->id)
        ->whereDay('created_at',date('d'))->first();
        if($v!==null)
        return redirect()->back()->with('duplicado','Ya existe un diezmante');
       if(Diezmo::create([
            'iglesias_id' => $id_ig->id,
            'miembros_id' => $request->id,
            'valor' => $request->diezmo,

        ])){

            return redirect()->back()->with('success','Se Añadio el diezmo Correctamente');
        }
    }
}
