<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Ingreso2 extends Model
{
    protected $table="ingresos2";
    protected $fillable=['iglesias_id','cuentas_id','valor','estado'];


public function cuenta(){
    return $this->belongsTo(Cuenta::class,'cuentas_id','id');
}
}
