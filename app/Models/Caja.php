<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
    protected $table="caja";
    protected $fillable=['iglesias_id','ingreso','egreso'];
}
