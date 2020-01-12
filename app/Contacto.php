<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    //
    protected $fillable = ['nombre', 'apellido', 'apodo', 'fecha_nac', 'genero', 'imagen', 'deleted'];
    protected $hidden = [
        'fecha_creacion', 'fecha_actualizacion',
    ];
}
