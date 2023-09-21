<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Emprendedor extends Model
{
    protected $table = 'emprendedor';
    protected $fillable = ['categoria_id','nombre_proyecto','equipo','contacto','media','resumen'];

    public function categoria()
    {
    	return $this->belongsTo(Categoria::class, 'categoria_id', 'id');
    }
}
