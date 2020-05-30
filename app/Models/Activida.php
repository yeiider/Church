<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activida extends Model
{
    protected $table="actividades";
    protected $fillable=['iglesias_id','publico','titulo','tipo',
    'lema','invita','descripcion','fecha_inicio','fecha_final','color','valor',
    'lugar','direccion','hora_inicio','hora_final','archivo'
];


public function iglesia(){
    return $this->belongsTo(Iglesia::class,'iglesias_id','id');
}

public function scopePublic($query){
    $iglesia=Iglesia::Id()->first();
  $query->when(request('publico')==1,function($q){
      return $q->where('publico','=',1);
  });
  $query->when(request(('publico')==3),function($q){
     $iglesia=Iglesia::Id()->first();
      return $q->where('iglesias_id','=',$iglesia->id);
  });
}
}
