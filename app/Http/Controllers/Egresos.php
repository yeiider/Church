<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use App\Models\Egreso;
use App\Models\Iglesia;
use Illuminate\Http\Request;

class Egresos extends Controller
{
    public function index(){

        return view('iglesia/egresos');
    }

    public function egresosAddView(){

        if(empty(auth()->user())){
            return redirect('/');
        }
        if(auth()->user()->rol==1){
            $egreso=Egreso::all();
        }else{
            $iglesia=Iglesia::Id()->first();
            $egreso=Egreso::where('iglesias_id', '=', $iglesia->id)->get();

        }
        $cuenta=Cuenta::where('cuenta', 'LIKE', '5%')
        ->get();
        $data=[
         'cuentas' => $cuenta,
         'egreso' => $egreso
        ];
        return view('iglesia/addegreso',compact('data'));
    }

    public function createEgreso(Request $request){
        $iglesia=Iglesia::Id()->first();

        if(empty($request->file)){
            $filename="";
        }else{
            $file=$request->file('file');
            $filename= date('d-m-y-s.i').$iglesia->id.$file->getClientOriginalName();
        }

        if(Egreso::create([
          'iglesias_id' => $iglesia->id,
          'cuentas_id' => $request->tipo,
          'valor' => $request->valor,
          'file' => $filename,
        ])){
            if(!empty($request->file)){
                $file->move(public_path().'/assets/iglesias/'.str_replace(" ","-",$iglesia->nombre).'/comprobantes/egresos/',$filename);
            }

            return redirect()->back();

        }
    }
}
