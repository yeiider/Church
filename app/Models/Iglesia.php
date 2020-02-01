<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Distrito;
use App\Models\Pastor;
use App\Models\Config;
use App\Models\Miembro;
use App\Models\Ingreso;
use App\Models\Diezmo;
use App\Models\Ofrenda;
class Iglesia extends Model
{
    protected $table="iglesias";

    protected $fillable=['distritos_id','nombre','pastor_id','email','pais','departamento','municipio','direccion',
                         'telefono','fecade_creacion','estado','iglesias_hijas','logo','referencia'];


public function distrito(){

    return $this->belongsTo(Distrito::class);
}

public function pastor(){
    return $this->belongsTo(Pastor::class);
}
public function miembros(){
    return $this->hasMany('App\Models\Miembro','iglesias_id','id');
}

public function confi(){
  return $this->belongsTo(Config::class);
}

public function ingresos(){
return $this->hasMany(Ingreso::class,'iglesias_id','id');
}

public function diezmos(){
    return $this->hasMany(Diezmo::class,'iglesias_id','id');
}

public function ofrendas(){
    return $this->hasMany(Ofrenda::class,'iglesias_id','id');
}

public function scopeId($query){
    return $query->where('email','=',auth()->user()->email);
}

}
