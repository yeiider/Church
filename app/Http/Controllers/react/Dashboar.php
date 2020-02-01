<?php

namespace App\Http\Controllers\react;

use App\Ciudad;
use App\Http\Controllers\Controller;
use App\Models\Miembro;
use App\Models\Iglesia;
use App\Models\Pastor;
use App\Models\Distrito;
use App\Models\Ofrenda;
use App\Models\Diezmo;
use App\Models\Ingreso;
use Illuminate\Http\Request;


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
            'categorias' => array(['id' => 1,'descripcion' => strtoupper('caballero'),'valor' => number_format(($this->caballeros/$this->miembros)*100,2,',',''),'color' => 'fa fa-square'],
                              ['id' => 2,'descripcion' => strtoupper('damas'),'valor' => number_format(($this->damas/$this->miembros)*100,2,',',''),'color' => 'fa fa-square purple'],
                              ['id' => 3,'descripcion' => strtoupper('jovenes'),'valor' => number_format(($this->jovenes/$this->miembros)*100,2,',',''),'color' => 'fa fa-square red'],
                              ['id' => 4,'descripcion' => strtoupper('semillas'),'valor' => number_format(($this->semillas/$this->miembros)*100,2,',',''),'color' => 'fa fa-square green']),
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

    public function infoIngresos(Request $request){
        $hoy=date('d-m-Y');
        if($request->ajax()){
         $fecha=explode(' - ',$request->data);
         $inicio=trim(date('Y-m-d',strtotime($fecha[0])));
         $fin=trim(date('Y-m-d',strtotime($fecha[1])));

         $fin=date('Y-m-d',strtotime($fin.'+ 1 days'));
        /* if($inicio==date('Y-m-d')){
             $fin=date('Y-m-d',strtotime($fin.'+ 1 days'));
         }
         if($inicio==$fin){
             $fin=date('Y-m-d',strtotime($fin.'+ 1 days'));
         }*/


         if(auth()->user()->rol==1){
            $iglesia=Iglesia::all();
            $diezmos=Diezmo::whereBetween('created_at',[$inicio,$fin])
            ->where('estado','=',true)
            ->get();
            $ofrendas=Ofrenda::whereBetween('created_at',[$inicio,$fin])
            ->where('estado','=',true)
            ->get();
            $otros=Ingreso::whereBetween('created_at',[$inicio,$fin])
            ->where('estado','=',true)
            ->get();
         }else{
             $iglesia=Iglesia::where('email', '=', auth()->user()->email)->first();
             $diezmos=Diezmo::where('iglesias_id', '=', $iglesia->id)
             ->where('estado','=',true)
             ->whereBetween('created_at', [$inicio,$fin])
             ->get();
             $ofrendas=Ofrenda::where('iglesias_id', '=', $iglesia->id)
             ->where('estado','=',true)
            ->whereBetween('created_at', [$inicio,$fin])
            ->get();
             $otros=Ingreso::where('iglesias_id', '=', $iglesia->id)
             ->where('estado','=',true)
            ->whereBetween('created_at', [$inicio,$fin])
            ->get();
         }

         $totalDiezmos=0;
         $totalOfrendas=0;
         $totalIngresos=0;

         foreach($diezmos as $d)
         $totalDiezmos+=$d->valor;

         foreach($ofrendas as $o)
         $totalOfrendas+=$o->ofrenda;

         foreach($otros as $t)
         $totalIngresos+=$t->valor;

         // return $totalDiezmos.' '. $totalOfrendas .' '.$totalIngresos;
         $data=[
             'tdiezmos' => number_format($totalDiezmos,0,',','.'),
             'tofrendas' => number_format($totalOfrendas,0,',','.'),
             'tingresos' => number_format($totalIngresos,0,',','.'),

             'diezmos' => $diezmos->count(),
             'ofrendas' => $ofrendas->count(),
             'ingresos' => $otros->count(),
             'total' => number_format($totalDiezmos + $totalIngresos +$totalOfrendas,0,',','.'),
             't'=> $diezmos->count() + $ofrendas->count() + $otros->count()

             ];

         return response()->json($data);
        }

    }

    public function chartIngresos(){

        $mesall=['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Obtubre','Noviembre','Diciembre'];
        $mes1=['Enero','Febrero','Marzo','Abril','Mayo','Junio'];
        $mes2=['Julio','Agosto','Septiembre','Obtubre','Noviembre','Diciembre'];
        $md=[];
        $mo=[];
        $mi=[];
        $vo=[0,0,0,0,0,0,0,0,0,0,0,0];
        $vd=[0,0,0,0,0,0,0,0,0,0,0,0];
        $vi=[0,0,0,0,0,0,0,0,0,0,0,0];

        if (auth()->user()->roll==1) {
            for ($i=0;$i<=12-1;$i++) {
                $ss=$mesall[$i];
                $k=Diezmo:: where('estado','=',true)->$ss()->get();
                $q=Ofrenda:: where('estado','=',true)->$ss()->get();
                $v=Ingreso:: where('estado','=',true)->$ss()->get();
                $s=0;
                foreach ($k as $md) {
                    $vd[$s]+=$md->valor;
                }
                foreach ($q as $md) {
                    $vo[$s]+=$md->ofrenda;
                }
                foreach ($v as $md) {
                    $vi[$s]+=$md->valor;
                }
                $s++;
            }
        }else{
          $iglesia=Iglesia::where('email','=',auth()->user()->email)->first();
          for($i=0;$i<=12-1;$i++){
           $ss=$mesall[$i];
           $k=Diezmo::where('iglesias_id','=',$iglesia->id)->where('estado','=',true)->$ss()->get();
           $q=Ofrenda::where('iglesias_id','=',$iglesia->id)->where('estado','=',true)->$ss()->get();
           $v=Ingreso::where('iglesias_id','=',$iglesia->id)->where('estado','=',true)->$ss()->get();
            $s=0;
           foreach($k as $md){$vd[$s]+=$md->valor;}foreach($q as $md){$vo[$s]+=$md->ofrenda;}foreach($v as $md){$vi[$s]+=$md->valor;}
           $s++;
          }

        }
        $mesesent=[];$valord=[];$valoro=[];$valori=[];
     for($i=0;$i<=date('m')-1;$i++){
        $mesesent[$i]=$mesall[$i];
        $valord[$i]=$vd[$i];
        $valoro[$i]=$vo[$i];
        $valori[$i]=$vi[$i];
     }

     $labels=[];
        $data=[
        'labels'=> $mesesent,
        'datasets' => array(['label' => 'Diezmos','backgroundColor'=>'#26B99A','data' => $valord],
                            ['label' => 'Ofrendas','backgroundColor' => '#03586A','data' => $valoro],
                            ['label' => 'Donaciones','backgroundColor' => '#17B6B4','data' => $valori]
                            )
        ];

        return response()->json($data);



    }

}
//Ciudad::all('id','nombre','distrito')->take(10)
