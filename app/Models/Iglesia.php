<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Distrito;
use App\Models\Pastor;
use App\Models\Config;
use App\Models\Miembro;
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

}
