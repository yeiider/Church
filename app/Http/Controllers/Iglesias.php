<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distrito;
use App\Models\Miembro;
use App\Models\Iglesia;
use App\User;
use App\Models\Config;
use Illuminate\Support\Facades\Mail;
use App\Mail\SednPassword;
use Illuminate\Support\Str;


class Iglesias extends Controller
{
    public function index(){
        $iglesia=Iglesia::all();
        $datos=['iglesia' => $iglesia];
       if(null!==auth()->user()){
        return view('admin/iglesias',compact('datos'));
       } else{
           return redirect('/');
       }




    }



    public function createIglesia(Request $request){
        // poner la contraseña en un input hidden crypt(Str::random(10));
        $verifica=User::where('email','=',$request->email)->first();
        if($verifica!=null)
         return redirect()->back()->with('duplicado','El correo ya se encuentra registrado intente con otro!');
        if(!empty(auth()->user()) && auth()->user()->rol==1){
           // $pass= crypt(Str::random(10));


            if (Iglesia::create([
           'distritos_id' => $request->distrito,
           'nombre' => ucwords($request->nombre),
           'pastor_id' => $request->pastor,
           'email' => $request->email,
           'pais' => $request->pais,
           'departamento' => $request->departamento,
           'municipio' => ucwords($request->municipio),
           'direccion' => $request->direccion,
           'telefono' => $request->telefono,
           'fecha_creacion' => $request->fecha,
           'estado' => 1,
           'logo' => 'logo.png',
           'iglesias_hijas' => $request->iglesias_hijas,

           'referencia' => str_replace(' ','-',$request->nombre)
         ])) {

            $id_iglesia=Iglesia::where('email','=',$request->email)->first();
            Config::create([
             'iglesias_id' => $id_iglesia->id,
             'portada' => 'logo.jpg',


            ]);

             if (User::create([
             'nombre' => $request->usuario,
             'apellido' => 'N/A',
             'rol' => 2,
             'email' => $request->email,
             'logo' => 'logo.png',
             'password' => crypt('iglesia123','$2a$07$usesomesillystringforsalt$')
         ])) {



           /* $data=[
                'password' => $pass,
                'nombre' => strtoupper($request->nombre)
            ];
            Mail::to($request->email, $request->nombre)->send(new SednPassword($data));
           }
            }*/
            return redirect()->back()->with('success','Se añadio la iglesia correctamente!');
             } else {
                 redirect('/');
             }
         }
        }
    }

    public function createIglesiaView(){
        if(!empty(auth()->user()) && auth()->user()->rol==1){
            return view('admin/iglesia_add');
        }else{
            return view('errors/404');
        }

    }


    public function perfil($id){

        if(null==auth()->user())
        return view('../errors.404');
        $iglesia=Iglesia::where('referencia','=',$id)->first();
        if($iglesia==null)
        return view('../errors.404');
        $user=User::where('email','=',$iglesia->email)->first();
        $damas=Miembro::where('iglesias_id','=',$iglesia->id)->Damas()->get()->count();
        $caballeros=Miembro::where('iglesias_id','=',$iglesia->id)->Caballeros()->get()->count();
        $jovenes=Miembro::where('iglesias_id','=',$iglesia->id)->Jovenes()->get()->count();
        $semillas=Miembro::where('iglesias_id','=',$iglesia->id)->Semillas()->get()->count();
        $casados=Miembro::where('iglesias_id','=',$iglesia->id)->Casados()->get()->count();
        $bautizados=Miembro::where('iglesias_id','=',$iglesia->id)->Bautizados()->get()->count();
        $solteros=Miembro::where('iglesias_id','=',$iglesia->id)->Solteros()->get()->count();
        $conzolidadando=Miembro::where('iglesias_id','=',$iglesia->id)->Conzolidadando()->get()->count();
        $config=Config::where('iglesias_id',$iglesia->id)->first();
        $hombres=Miembro::where('iglesias_id','=',$iglesia->id)->where('genero','=',1)->get()->count();
        $mujeres=Miembro::where('iglesias_id','=',$iglesia->id)->where('genero','=',2)->get()->count();
        $data=[
            'iglesia' => $iglesia,
            'caballeros' => $caballeros,
            'damas' => $damas,
            'jovenes' => $jovenes,
            'semillas' => $casados,
            'solteros' => $solteros,
            'bautizados' => $bautizados,
            'total' => $iglesia->miembros->count(),
            'hombres' => $hombres,
            'mujeres' => $mujeres,
            'config' => $config,
            'user' => $user

        ];


        return view('../admin/perfilIglesia',compact('data'));
    }

    public function updatePerfil(Request $request){
        if(empty(auth()->user()))
        return view('../errors.404');

      $iglesia=Iglesia::where('email','=',auth()->user()->email)->first();
      $iglesia=Iglesia::find($iglesia->id);
      $config=Config::where('iglesias_id','=',$iglesia->id)->first();
      $config=Config::find($config->id);
      $user=User::find(auth()->user()->id);
      $iglesia->nombre=ucwords($request->nombre);
      $iglesia->telefono=$request->telefono;
      $iglesia->direccion=ucwords($request->direccion);
      $iglesia->fecha_creacion=date('Y-m-d',strtotime($request->fecha));

      $user->nombre=ucwords($request->user);
      $user->apellido=ucwords($request->apellido);

      if(empty($request->perfil)){
        $img1=$user->logo;
      }else{
        $file1=$request->file('perfil');
        $img1 =  date('d-m-y-sh') . $file1->getClientOriginalName();
      }
      $user->logo=$img1;
      $iglesia->logo=$img1;

      if (!empty($request->contra)) {
        if($request->contran!=$request->confirma)
        return back()->withErrors(['password' => trans('auth.failed')]);
         if (Hash::check($request->contra, $user->password)) {
             $user->password=crypt($request->contran,'$2a$07$usesomesillystringforsalt$');
         } else {
             return back()->withErrors(['password' => trans('auth.failed')]);
         }
     }


     $config->servicios=$request->servicios;
     if(empty($request->portada)){
        $img2=$config->portada;
      }else{
        $file2=$request->file('portada');
        $img2 =  date('d-m-y-sh') . $file2->getClientOriginalName();
      }
      $config->portada=$img2;



      if(!empty($request->portada)){
        array_map('unlink', glob(public_path().'/assets/iglesias/'.str_replace(" ","-",$iglesia->nombre).'/portadas/' . $config->portada));
        $file2->move(public_path().'/assets/iglesias/'.str_replace(" ","-",$iglesia->nombre).'/portadas',$img2);
      }
      if(!empty($request->perfil)){
        array_map('unlink', glob(public_path().'/assets/iglesias/'.str_replace(" ","-",$iglesia->nombre).'/perfiles/' . $user->logo));
        $file1->move(public_path().'/assets/iglesias/'.str_replace(" ","-",$iglesia->nombre).'/perfiles',$img1);
      }

      $user->save();
      $iglesia->save();

      if($config->save()){
        return redirect()->back()->with('success','Todos sus datos se actualizaron correctamente!');
      }

    }
}
