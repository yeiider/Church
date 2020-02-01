<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtroIngreso extends Model
{
    protected $table="ingresobasicos";
    protected $fillable=['iglesias_id','valor','motivo','estado'];
}
