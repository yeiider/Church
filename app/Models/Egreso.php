<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Egreso extends Model
{
    protected $table="egresos";
    protected $fillable=['iglesias_id','cuentas_id','valor','file','estado'];


    public function iglesia(){
        return $this->belongsTo(Iglesia::class,'iglesias_id','id');
    }

    public function cuenta(){
        return $this->belongsTo(Cuenta::class,'cuentas_id','id');
    }
}
