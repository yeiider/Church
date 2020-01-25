<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Home extends Controller
{
    public function index(){
        if(!empty(auth()->user())){
            return view('index');
        }else{
            return redirect('/');
        }

    }
}
