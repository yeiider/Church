<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoIngreso extends Model
{
    protected $table="tipoingreso";
    protected $fillable=['codigo','nombre'];
}
