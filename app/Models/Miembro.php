<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Iglesia;
use App\Models\Diezmo;

class Miembro extends Model
{
    protected $table="miembros";
    protected $fillable=['iglesias_id','nombres','apellidos','identificacion','genero','edad','fecha_nacimiento',
                         'estado_civil','num_hijos','diezma','estado','fecha_inicio','empleado','estrato','etnia',
                         'discapasida','pais','departamento','municipio','direccion','telefono'];

    public function iglesia(){
        return $this->belongsTo(Iglesia::class,'iglesias_id','id');
    }

    public function scopeDamas($query){

        $query->when(request('estado_civil') == 2,function ($q){
           return $q->where('genero','=',2);
        });
        $query->when(request('estado_civil') != 2,function($q){
            return $q->where('genero','=',2)
            ->where('edad','>',28);

        });

    }
    public function scopeCaballeros($query){

        $query->when(request('genero') == 1,function ($q){
           return $q->where('genero','=',1);
        });
        $query->when(request('genero') != 1,function($q){
            return $q->where('genero','=',1)
            ->where('edad','>',28);

        });

    }

    public function scopeJovenes($query){

        $query->when(request('estado_civil') != 2,function ($q){
           return $q->where('edad','>=',15)
           ->where('edad','<=',28);
        });


    }
    public function scopeSemillas($query){

        $query->when(request('estado_civil') != 2,function ($q){
           return $q->where('edad','>',7)
           ->where('edad','<=',14);
        });


    }
    public function scopeCasados($query){
        return $query->where('estado_civil','=',2);
    }
    public function scopeBautizados($query){
        return $query->where('estado','=',0);
    }
    public function scopeSolteros($query){
        return $query->where('estado_civil','=',1);
    }
    public function scopeConzolidadando($query){
        return $query->where('estado','=',1);
    }

    public function diezmos(){
     return $this->hasMany(Diezmo::class,'miembros_id','id');
    }



}
