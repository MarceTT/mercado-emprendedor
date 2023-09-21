<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactoEmail;
use App\Model\Contacto;

class Contactanos extends Component
{
    public $nombre,$paterno,$materno,$telefono,$correo,$correo2,$comentario;
    
    public function contactar()
    {
        $this->validate([
            'nombre' => 'required',
            'paterno' => 'required',
            'materno' => 'required',
            'telefono' => 'required|numeric',
            'correo' => 'required|email',
            'correo2' => 'required|email|same:correo',
            'comentario' => 'required'
        ]);
        

        $contacto = Contacto::create([
            'nombre_contacto' => $this->nombre,
            'apellido_paterno' => $this->paterno,
            'apellido_materno' => $this->materno,
            'telefono' => $this->telefono,
            'email' => $this->correo,
            'mensaje' => $this->comentario

        ]);
        //dd($contacto);
        //exit();

        $mensaje = [
            'nombre' => $this->nombre,
            'apellido_paterno' => $this->paterno,
            'apellido_materno' => $this->materno,
            'telefono' => $this->telefono,
            'email' => $this->correo,
            'mensaje' => $this->comentario
        ];
        $email = 'mercadoemprendedor@upv.cl';

        Mail::to($this->correo)->cc($email)->send(new ContactoEmail($mensaje));

        session()->flash('success', 'Tus datos fueron enviados satisfactoriamente, en breve nos pondremos en contacto con usted');
        return redirect()->to('/contacto');

        
    }

    public function render()
    {
        return view('livewire.contactanos');
    }
}
