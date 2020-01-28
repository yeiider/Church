<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ofrenda extends Model
{
    protected $table='ofrendas';
    protected $fillable=['iglesias_id','tipo_ofrenda','ofrenda','fecha','nota'];
}
