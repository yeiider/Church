<?php

namespace App\Http\Controllers\react;

use App\Ciudad;
use App\Http\Controllers\Controller;
use App\Models\Miembro;
use App\Models\Iglesia;
use App\Models\Pastor;
use App\Models\Distrito;


class Dashboar extends Controller
{
    private $miembros;
    private $pastores;
    private $iglesias;
    private $damas;
    private $caballeros;
    private $jovenes;
    private $semillas;
    private $casados;
    private $bautizados;
    private $soltero;
    private $conzolidadando;
    private $hombres;
    private $mujeres;
    private $distritos;


    public function __construct()
    {
        $this->miembros=Miembro::all()->count();
        $this->pastores=Pastor::all()->count();
        $this->iglesias=Iglesia::all()->count();
        $this->damas=Miembro::Damas()->get()->count();
        $this->caballeros=Miembro::Caballeros()->get()->count();
        $this->jovenes=Miembro::Jovenes()->get()->count();
        $this->semillas=Miembro::Semillas()->get()->count();
        $this->casados=Miembro::Casados()->get()->count();
        $this->bautizados=Miembro::Bautizados()->get()->count();
        $this->solteros=Miembro::Solteros()->get()->count();
        $this->conzolidadando=Miembro::Conzolidadando()->get()->count();
        $this->hombres=Miembro::where('genero','=',1)->get()->count();
        $this->mujeres=Miembro::where('genero','=',2)->get()->count();
        $this->distritos=Distrito::all()->count();

    }
    public function info(){

      $data=[
        'miembros' => $this->miembros,
        'iglesias' => $this->iglesias,
        'pastores' => $this->pastores,
        'hombres' => $this->hombres,
        'mujeres' => $this->mujeres,
        'distritos' => $this->distritos,
        'usuario' => 'Yeider Adrian Mina',
        'categorias' => array(['id' => 1,'descripcion' => strtoupper('caballero'),'valor' => $this->caballeros],
                              ['id' => 2,'descripcion' => strtoupper('damas'),'valor' => $this->damas],
                              ['id' => 3,'descripcion' => strtoupper('jovenes'),'valor' => $this->jovenes],
                              ['id' => 4,'descripcion' => strtoupper('semillas'),'valor' => $this->semillas],
                              ['id' => 5,'descripcion' => strtoupper('casados'),'valor' => $this->casados],
                              ['id' => 6,'descripcion' => strtoupper('solteros'),'valor' => $this->solteros],
                              ['id' => 7,'descripcion' => strtoupper('bautizados'),'valor' => $this->bautizados],
                              ['id' => 8,'descripcion' => strtoupper('conzolidando'),'valor' => $this->conzolidadando]
                              )


      ];
      if(!empty(auth()->user())){
        return response()->json(
            $data
                );
    }else{
        return view('errors.404');
    }
      return response()->json($data);
    }

     public function chartDashboar(){

        $datos=[
            'type' => 'doughnut',
            'tooltipFillColor' => 'rgba(51,41,51,0.55)',
            'data' => array('labels' => ['Caballeros','Damas','Jovenes','Semillas'],
            'datasets' => [array('data' => [$this->caballeros,$this->damas,$this->jovenes,$this->semillas], 'backgroundColor' => ["#BDC3C7",
            "#9B59B6","#E74C3C","#26B99A"], 'hoverBackgroundColor'=> [ "#CFD4D8",
            "#B370CF","#E95E4F","#36CAAB"]) ]),
            'options' => array('legend' => false,'responsive'=>false),
            'categorias' => array(['id' => 1,'descripcion' => strtoupper('caballero'),'valor' => ($this->caballeros/$this->miembros)*100,'color' => 'fa fa-square'],
                              ['id' => 2,'descripcion' => strtoupper('damas'),'valor' => ($this->damas/$this->miembros)*100,'color' => 'fa fa-square purple'],
                              ['id' => 3,'descripcion' => strtoupper('jovenes'),'valor' => ($this->jovenes/$this->miembros)*100,'color' => 'fa fa-square red'],
                              ['id' => 4,'descripcion' => strtoupper('semillas'),'valor' => ($this->semillas/$this->miembros)*100,'color' => 'fa fa-square green']),
            'pastores' =>   array( ["id" => 1,
            "nombre" => "Yeider Adrian",
            "apellido" => "Mina Caicedo"],
            ["id" => 2,
            "nombre" => "Andres Camilo",
            "apellido" => "Castillo Fernandez"])


        ];
        if(!empty(auth()->user())){
            return response()->json(
                $datos
                    );
        }else{
            return view('errors.404');
        }

    }

    public function getPastores(){
        $data=Pastor::all('id','nombre','apellido');

         $send=[
            // $data->id => $data->nombre .' '. $data->apellido
            '32' => 'Yeider Adrian Mina',
            '36' => 'Andres Felipe',
            '40' => 'Felipe Cordoba'
         ];

        /* $pastores=
            array( ["id" => 1,
             "nombre" => "Yeider Adrian",
             "apellido" => "Mina Caicedo"],
             ["id" => 2,
             "nombre" => "Andres Camilo",
             "apellido" => "Castillo Fernandez"]);*/
             $pastores=Pastor::all('id','nombre','apellido');

         if(!empty(auth()->user())){
            return response()->json($pastores);
        }else{
            return view('errors.404');
        }

    }
   public function getPais(){
       $municipio=Ciudad::all();
       /*$data=[
         $municipio->id_municipio=>$municipio->municipio
       ];*/
       return response()->json(json_decode($municipio));
    }

    public function iglesias(){
        $iglesias=Iglesia::all();
        return response()->json();
    }


}
//Ciudad::all('id','nombre','distrito')->take(10)
