<?php

namespace App\Http\Controllers;

use App\Models\Caja;
use App\Models\Cuenta;
use App\Models\Iglesia;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class Cuentas extends Controller
{
    public function index(){
        if(empty(auth()->user())){
            return view('errors/404');
        }
        $cuentas=Cuenta::all();
        $data=[
            'cuentas' => $cuentas
        ];
        return view('cuentas',compact('data'));
    }

    public function create(Request $request){
            $iglesia=Iglesia::Id()->first();
        if(Cuenta::create([
            'iglesias_id' => $iglesia->id,
            'cuenta' => ucwords($request->codigo),
            'nombre' => ucwords($request->nombre),
            'debito' => 0,
            'credito' => 0,
            'naturaleza' => $request->naturaleza
        ])){
         return redirect()->back()->with('success','Se registro la cuenta');
        }
    }

    public function drop($id){
        if(Cuenta::destroy($id)){
            return redirect()->back();
        }

    }


}
