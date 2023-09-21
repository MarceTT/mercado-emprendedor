<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Unirme extends Model
{
    protected $table = 'unirme';

    protected $fillable = [
        'nombre', 
        'rut', 
        'carrera', 
        'sede', 
        'nombrenegocio', 
        'ciudadnegocio', 
        'rubro', 
        'pagos', 
        'despacho',
        'condiciones',
        'atencion',
        'correo',
        'direccion',
        'facebook',
        'instagram',
        'descripcion',
        'carpeta',
        'imagen' 
        
    ];
}
