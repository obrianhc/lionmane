<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Contacto;

class Telefono extends Model
{
    public $timestamps = true;
    protected $fillable = ['numero_de_telefono', 'categoria', 'deleted'];

    public function contacto(){
        return $this->belongsTo(Contacto::class);
    }
}
