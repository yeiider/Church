<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nomina extends Model
{
    protected $table="nomina";
    protected $fillable=['iglesias_id','empleados_id','dias','basico',
                        'aux_transporte','total_devengado','salud','pension',
                        'total_deducciones','neto','nota','aprobado','elaborado',
                        'contavilizado','codigo'];

 public function empleado(){
     return $this->belongsTo(Empleado::class,'empleados_id','id');
 }

 public function iglesia(){
     return $this->belongsTo(Iglesia::class,'iglesias_id','id');
 }
}
