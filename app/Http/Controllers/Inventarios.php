<?php

namespace App\Http\Controllers;

use App\Models\Iglesia;
use App\Models\Inventario;
use Illuminate\Http\Request;

class Inventarios extends Controller
{
    public function index(){

        if(empty(auth()->user())){
            return redirect('/');
        }

        $iglesia=Iglesia::Id()->first();
        if(auth()->user()->rol==1){
        $inventario=Inventario::all();
        }else{
        $inventario=Inventario::where('iglesias_id','=',$iglesia->id)->get();
        }

        return view('iglesia.inventario',compact('inventario'));
    }

    public function create(Request $request){
        if(empty(auth()->user())){
            return redirect('/');
        }
        $iglesia=Iglesia::Id()->first();

        if(empty($request->file)){
            $img="";
        }else{
            $file=$request->file('file');
            $img=date('d-m-Y-is').$file->getClientOriginalName();
        }
        if(Inventario::create([
            'iglesias_id' => $iglesia->id,
            'articulo' => \ucwords($request->nombre),
            'cantida' => $request->cantidad,
            'valor' => $request->valor,
            'imagen' => $img,
            'marca' => $request->marca
        ])){
            if(!empty($request->file)){
                $file->move(public_path().'assets/iglesias/'.str_replace(" ","-",$iglesia->nombre).'/inventario/',$img);
            }
            return redirect()->back()->with('success','Se realizo el registro del articulo correctamente');
        }
    }
}
