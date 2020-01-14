<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Contacto;

class Email extends Model
{
    public $timestamps = true;
    protected $fillable = ['contacto_id', 'correo', 'categoria', 'deleted'];

    public function contacto(){
        return $this->belongsTo(Contacto::class);
    }
}
