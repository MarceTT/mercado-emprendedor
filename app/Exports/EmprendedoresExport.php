<?php

namespace App\Exports;

use App\Model\Emprendedor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmprendedoresExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'ID',
            'NOMBRE',
            'SEDE',
            'EQUIPO',
            'CONTACTO',
            'RESUMEN',
            'ESTADO',
            'FECHA INGRESO'

        ];
    }
    public function collection()
    {
        $datos = Emprendedor::select('id', 'nombre_proyecto', 'sede', 'equipo', 'contacto', 'resumen', 'estado', 'created_at')
                      ->get();  
        return $datos;
        
    }
}