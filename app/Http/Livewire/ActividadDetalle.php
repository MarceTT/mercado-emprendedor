<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Crypt;
use App\Model\Actividad;

class ActividadDetalle extends Component
{
    public $actividad;
    public function mount($id)
    {
        $id_decrypt = Crypt::decrypt($id);
        $actividad = Actividad::where('id','=',$id_decrypt)->get();
        $this->actividad = $actividad;
        //dd($this->detalle);
        //exit();
    }
    public function render()
    {
        return view('livewire.actividad-detalle', [ 'actividades' => $this->actividad]);
    }
}
