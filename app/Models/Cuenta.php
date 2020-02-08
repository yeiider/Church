<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    protected $table="cuentas";
    protected $fillable=['iglesias_id','nombre','cuenta','debito','credito','naturaleza'];
}
