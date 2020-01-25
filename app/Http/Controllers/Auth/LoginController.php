<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest',['only' => 'form'])->except('logout');
    }

    public function form(){
        if(!empty(auth()->user())){
            redirect('Home');
        }else{
            return view('login');
        }

    }

    public function valida(Request $request){
    /*$credenciales=$this->validate(request(),[
        'email' => 'email|requered|string',
        'password' => 'required|string'
    ]);*/
    $email=$request->email;
    $password= $request->password;
    if(Auth::attempt(['email' => $email, 'password' => $password])){
      return redirect('home');
    }
    return back()
    ->withErrors(['email' => trans('auth.failed')])
    ->withInput(request(['email']));
    }

    public function logaut(){
        Auth::logout();
        return redirect('/');
    }
}
