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
        $actividades=Activida::where('publico','=',1)
        ->where('iglesias_id','=',$iglesia->id)
        ->get();
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

    public function viewActivityPdf($id){
        if(empty(auth()->user())){
            return view('errors.404');
        }
        $activity=Activida::find($id);

       return \PDF::loadView('pdf.actividad', compact('activity'))->stream('Actividad'.' '. $activity->lema.'pdf');
    }

    public function managerActivity(){
        $iglesia=Iglesia::Id()->first();
        $activity=Activida::where('iglesias_id','=',$iglesia->id)->get();

        return view('iglesia.activity',compact('activity'));
    }

    public function drop($id){
    $iglesia=Iglesia::Id()->first();
        if($id==$iglesia->id){
         $activity=Activida::find($id);
         array_map('unlink', glob(public_path().'/assets/img/actividades/' . $activity->archivo));
         Activida::destroy($id);
         return redirect()->back()->with('success','Se ejecuto la acción correctamente');
        }else{
            return redirect()->back();
        }


    }

    public function updateActivity(Request $request){
        $iglesia=Iglesia::Id()->first();

         $activity=Activida::find($request->id);
         if($activity->iglesias_id==$iglesia->id){
         $activity->tipo=strtoupper($request->tipo);
         $activity->publico=$request->publico;
         $activity->titulo=strtoupper($request->titulo);
         $activity->lema=strtoupper($request->lema);
         $activity->lugar= ucwords($request->lugar);
         $activity->fecha_inicio=$request->inicio;
         $activity->fecha_final=$request->fin;
         $activity->direccion=$request->direccion;
         $activity->color=$request->color;
         $activity->hora_inicio=$request->hora_inicio;
         $activity->hora_final=$request->final;
         $activity->descripcion=ucfirst($request->descripcion);
         $activity->valor=$request->varor;
         $activity->invita=ucwords($request->invita);

         if(empty($request->file)){

           $filename=$request->archivo;
         }else{
            $file=$request->file('file');
            $filename=date('d-m-y-i-s') . $file->getClientOriginalName();
         }
         $activity->archivo=$filename;


         if(!empty($request->file)){
            array_map('unlink', glob(public_path().'/assets/iglesias/'.str_replace(" ","-",$iglesia->nombre).'/actividades/' . $activity->archivo));
            $file->save(public_path().'/assets/iglesias/'.str_replace(" ","-",$iglesia->nombre).'/actividades'. $filename);
         }
         if($activity->save()){
           return redirect()->back()->with('success','Se guardaron tus datos correctamente');
         }
        }else{
            return redirect()->back();
        }

    }
}
