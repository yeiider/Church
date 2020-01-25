<?php

namespace App\Http\Controllers\react;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Distrito;
use App\Models\Pastor;

class DistritosInfo extends Controller
{
    public function info(){
        $pas=Pastor::all();
        if(empty($pass)){
         $pas=[];
        }
  $data=[
    'token' => csrf_token(),
    'pastores' => $pas,
    'distritos'=>Distrito::all()
  ];

  return response()->json($data);
    }

    public function getDistrito(){
        return response()->json();
    }
}
