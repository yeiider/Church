<?php

namespace App\Console\Commands;

use App\Models\Caja;
use App\Models\Diezmo;
use App\Models\Iglesia;
use App\Models\Ingreso;
use App\Models\Ingreso2;
use App\Models\Ofrenda;
use App\Models\OtroIngreso;
use Illuminate\Console\Command;

class InsertCaja extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:caja';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insertar Valores a la Caja';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        function valor($data,$keys){
            $rest=0;
           foreach($data as $v){
            $rest+=$v->$keys;
           }
           return $rest;
        }
        function agregarCaja($id,$ingreso,$egreso){
           Caja::create([
               'iglesias_id' => $id,
               'ingreso' =>$ingreso,
               'egreso' => $egreso
           ]);
        }

        $iglesias=Iglesia::all();
        foreach($iglesias as $i){
        $donaciones=Ingreso::where('iglesias_id','=',$i->id)->whereDay('created_at',date('d'))->get();
        $diezmos=Diezmo::where('iglegresoesias_id','=',$i->id)->whereDay('created_at',date('d'))->get();
        $ofrendas=Ofrenda::where('iglesias_id','=',$i->id)->whereDay('created_at',date('d'))->get();
        $otros=Ingreso2::where('iglesias_id','=',$i->id)->whereDay('created_at',date('d'))->get();

        $totalingresos=valor($donaciones,'valor')+valor($diezmos,'valor')+valor($ofrendas,'ofrenda')+valor($otros,'valor');
        agregarCaja($i->id,$totalingresos,10000);
      }

    }
 }


