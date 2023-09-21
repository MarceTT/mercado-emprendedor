<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Crypt;
use Livewire\WithPagination;
use App\Model\Emprendedor;
use App\Model\Categoria;

class Emprendedores extends Component
{
    public $emprendedor,$categoria;
    
    public function mount($id)
    {
        $id_decrypt = Crypt::decrypt($id);
        $categoria = Categoria::where('id','=',$id_decrypt)->get();
        $emprendedor = Emprendedor::where('categoria_id','=',$id_decrypt)->where('estado','=',1)->get();
        $this->categoria = $categoria;
        $this->emprendedor = $emprendedor;
        //dd($this->categoria);
        //exit();
        
    }
    public function render()
    {
        return view('livewire.emprendedores', [ 'emprendedores' => $this->emprendedor, 'categorias' => $this->categoria]);
    }
}
