<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Telefono;
use App\Email;

class Contacto extends Model
{
    public $timestamps = true;
    protected $fillable = ['nombre', 'apellido', 'apodo', 'fecha_nac', 'genero', 'imagen', 'deleted'];
    protected $hidden = [
        'fecha_creacion', 'fecha_actualizacion',
    ];

    public function telefonos(){
        return $this->hasMany(Telefono::class);
    }

    public function correos(){
        return $this->hasMany(Email::class);
    }
}
