<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pastor extends Model
{
    protected $table='pastors';
    protected $fillable=[
        'nombre',
        'apellido',
        'identificacion',
        'genero',
        'edad',
        'fecha_nacimiento',
        'etnia',
        'casado',
        'num_hijod',
        'email',
        'direccion',
        'pais',
        'departamento',
        'municipio',
        'descripcion',
        'logo',
        'cargo',
        'arl',
        'afp',
        'eps'
    ];
}
