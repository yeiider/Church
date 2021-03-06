<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtroIngreso extends Model
{
    protected $table="otroingreso";
    protected $fillable=['iglesias_id','tipo_id','valor','estado'];

    public function scopeEnero($query){
        $query->whereMonth('created_at','01');
       }
       public function scopeFebrero($query){
           return $query->whereMonth('created_at','02');
          }
       public function scopeMarzo($query){
           return $query->whereMonth('created_at','03');
          }
       public function scopeAbril($query){
           return $query->whereMonth('created_at','04');
          }
       public function scopeMayo($query){
           return $query->whereMonth('created_at','05');
          }
       public function scopeJunio($query){
           return $query->whereMonth('created_at','06');
          }
       public function scopeJulio($query){
           return $query->whereMonth('created_at','07');
          }
       public function scopeAgosto($query){
           return $query->whereMonth('created_at','08');
          }
       public function scopeSeptiembre($query){
           return $query->whereMonth('created_at','09');
          }
       public function scopeObtubre($query){
           return $query->whereMonth('created_at','10');
          }
       public function scopeNoviembre($query){
           return $query->whereMonth('created_at','11');
          }
       public function scopeDiciembre($query){
           return $query->whereMonth('created_at','12');
          }
}
