<?php

namespace App\Http\Controllers;
use App\Models\Iglesia;
use App\Models\Pastor;
use App\User;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Users extends Controller
{
    public function index(){
        if(empty(auth()->user()))
        return view('../errors.404');
        if(auth()->user()->rol==1){
           $user=User::where('id','=',auth()->user()->id)->first();
           return view('../admin.perfil1', compact('user'));
        }else if(auth()->user()->rol==2){
           $iglesia=Iglesia::where('email','=',auth()->user()->email)->first();
           $user=User::where('id','=',auth()->user()->id)->first();
           $config=Config::where('iglesias_id','=',$iglesia->id)->first();
           $data=[
               'iglesia' => $iglesia,
               'user' => $user,
               'config' => $config
           ];
           return view('../admin.perfil2', compact('data'));
        }else if(auth()->user()->rol==3){

        }
    }

    public function update(Request $request){
        if(empty(auth()->user()))
        return view('../errors.404');
        $user =   User::find(auth()->user()->id);

        $user->nombre=$request->nombre;
        $user->apellido=$request->apellido;
        if (!empty($request->contra)) {
           if($request->contran!=$request->confirma)
           return back()->withErrors(['password' => trans('auth.failed')]);
            if (Hash::check($request->contra, $user->password)) {
                $user->password=crypt($request->contran,'$2a$07$usesomesillystringforsalt$');
            } else {
                return back()->withErrors(['password' => trans('auth.failed')]);
            }
        }
        if($user->save()){
            return redirect()->back()->with('success','se actualizaron sus datos correctamente! :-D');
        };

     }
 }

