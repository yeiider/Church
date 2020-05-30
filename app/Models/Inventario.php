<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table="inventarios";
    protected $fillable=['iglesias_id','cantida','marca','valor','imagen','articulo'];

    public function iglesia(){
        return $this->belongsTo(Iglesia::class,'iglesias_id','id');
    }
}
