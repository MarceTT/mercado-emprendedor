<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Model\Actividad;
use Carbon\Carbon;
use Jenssegers\Date\Date;

class Actividades extends Component
{
	use WithPagination;
    public $dia,$mes,$nombre,$resumen,$hora_inicio,$hora_termino;

    public function mount()
    {
        
    }

    public function render()
    {
        return view('livewire.actividades', [
            'actividades' => Actividad::orderBy('fecha', 'ASC')->paginate(4),
        ]);
    }
}
