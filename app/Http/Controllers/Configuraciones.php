<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use Illuminate\Http\Request;

class Configuraciones extends Controller
{
    public function index(){

        if(empty(auth()->user())){
            return view('errors/404');
        }
        $cuentas=Cuenta::all();
        $data=[
            'cuentas' => $cuentas
        ];
        return view('admin/config',compact('data'));


    }
}
