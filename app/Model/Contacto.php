<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $table = 'contacto';

    protected $fillable = [
        'nombre_contacto', 'apellido_paterno', 'apellido_materno', 'telefono', 'email', 'mensaje'
    ];
}
