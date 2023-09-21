<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Crypt;
use App\Model\Emprendedor;

class EmprendedoresMostrar extends Component
{
    public $detalle;
    public function mount($id)
    {
        $id_decrypt = Crypt::decrypt($id);
        $detalle = Emprendedor::where('id','=',$id_decrypt)->get();
        $this->detalle = $detalle;
        //dd($this->detalle);
        //exit();
    }
    public function render()
    {
        return view('livewire.emprendedores-mostrar', [ 'detalles' => $this->detalle]);
    }

}
