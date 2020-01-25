<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Miembro;

class Diezmo extends Model
{
    protected $table='diezmos';
    protected $fillable=['iglesias_id','miembros_id','fecha','valor'];

public function miembro(){
    return $this->belongsTo(Miembro::class,'miembros_id','id');

}
}
