<?php

namespace App\Http\Controllers;

use App\Models\Activida;
use App\Models\Iglesia;
use Illuminate\Http\Request;

class Actividades extends Controller
{

    public function index(){
       if(empty(auth()->user())){
           return redirect('/');
       }
        $iglesia=Iglesia::Id()->first();
        $actividades=Activida::all();
        $iglesias = Iglesia::all();

        $data=[
            'iglesias' => $iglesias,
            'actividades' => $actividades,
        ];

        return view('actividades',compact('data'));
    }

    public function create (Request $request){
       $iglesia=Iglesia::Id()->first();
       if(!empty($request->file)){
           $file=$request->file('file');
           $fileName=date('d-m-y-i-s') . $file->getClientOriginalName();
       }else{
           $fileName='N/A';
       }
       if(Activida::create([
           'iglesias_id' => $iglesia->id,
           'publico' => $request->publico,
           'titulo' => strtoupper($request->tipo),
           'tipo' => strtoupper($request->titulo),
           'lema' => strtoupper($request->lema),
           'invita' => ucwords($request->invita),
           'descripcion' => ucfirst($request->describe),
           'valor' => $request->valor,
           'lugar' => ucwords($request->lugar),
           'direccion' => $request->direccion,
           'hora_inicio' => $request->hora_inicio,
           'hora_final '=> $request->hora_final,
           'fecha_inicio' => $request->inicio,
           'fecha_final' => $request->fin,
           'color' => $request->color,
           'archivo' => $fileName
       ])){
        if(!empty($request->file))
         $file->move(public_path().'/assets/actividades/file',$fileName);
         return redirect()->back()->with('success','Se registro la actividad correctamente');
       }
    }
}
