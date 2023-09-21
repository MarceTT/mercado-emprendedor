<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Model\Categoria;


class Categorias extends Component
{
    use WithPagination;
    public $name = '';
    public function mount()
    {
        $this->name = 'Marcelo';
    }

    public function render()
    {
        return view('livewire.categorias', [
            'categorias' => Categoria::latest()->paginate(12),
        ]);
    }

}
