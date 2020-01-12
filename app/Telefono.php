<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    //
    protected $fillable = ['numero_de_telefono', 'categoria', 'deleted'];
}
