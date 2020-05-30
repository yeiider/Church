<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Iglesia;
use App\Models\Nomina;
class Empleado extends Model
{
    protected $table="empleados";
    protected $fillable=['iglesias_id','identificacion','nombre','apellido','ciudad','direccion','estado',
                         'tipo_contrato','fecha_ingreso','fecha_final','jefe','fecha_retiro','periodo_pago',
                         'salario','soporte','email','telefono'];

    public function iglesia(){
        return $this->belongsTo(Iglesia::class,'iglesias_id','id');
    }

    public function nominas(){
        return $this->hasMany(Nomina::class,'empleados_id','id');
    }
}
