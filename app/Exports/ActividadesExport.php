<?php

namespace App\Exports;

use App\Model\Actividad;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ActividadesExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'ID',
            'NOMBRE',
            'DETALLE ACTIVIDAD',
            'FECHA ACTIVIDAD',
            'HORA INICIO',
            'HORA TERMINO',
            'FECHA CREACION',

        ];
    }
    public function collection()
    {
        $datos = Actividad::select('id', 'nombre', 'detalle_actividad', 'hora_inicio', 'hora_termino', 'created_at')
                      ->get();  
        return $datos;
        
    }
}