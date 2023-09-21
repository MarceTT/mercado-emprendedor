<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Mail;
use App\Mail\UnirseAdmin;
use App\Model\Unirme;

class Unirse extends Component
{
    use WithFileUploads;
    public $nombre,$rut,$carrera,$sede,$nombrenegocio,$ciudadnegocio,$rubro,$pagos,$despacho,$condiciones,$atencion,$correo,$direccion,$facebook,$instagram,$descripcion,$imagen;
    public function unirse()
    {
        $this->validate([
            'nombre' => 'required',
            'rut' => 'required',
            'carrera' => 'required',
            'sede' => 'required',
            'nombrenegocio' => 'required',
            'ciudadnegocio' => 'required',
            'rubro' => 'required',
            'pagos' => 'required',
            'despacho' => 'required',
            'condiciones' => 'required',
            'atencion' => 'required',
            'correo' => 'required|email',
            'descripcion' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png|max:2048'
        ]);



        $unirse = new Unirme();
        $unirse->nombre = $this->nombre;
        $unirse->rut = $this->rut;
        $unirse->carrera = $this->carrera;
        $unirse->sede = $this->sede;
        $unirse->nombrenegocio = $this->nombrenegocio;
        $unirse->ciudadnegocio = $this->ciudadnegocio;
        $unirse->rubro = $this->rubro;
        $unirse->pagos = implode(',', $this->pagos);
        $unirse->despacho = $this->despacho;
        $unirse->condiciones = $this->condiciones;
        $unirse->atencion = $this->atencion;
        $unirse->correo = $this->correo;
        $unirse->direccion = $this->direccion;
        $unirse->facebook = $this->facebook;
        $unirse->instagram = $this->instagram;
        $unirse->descripcion = $this->descripcion;
        $carpeta = $this->imagen->storePublicly('imagenes/unirse', 'public');
        $destinationPath = $carpeta;
        $unirse->carpeta = $destinationPath;
        $unirse->imagen = $this->imagen->storePublicly('imagenes/unirse', 'public');
        $unirse->save();
        

      $mensaje = [
            'nombre' => $this->nombre,
            'rut' => $this->rut,
            'carrera' => $this->carrera,
            'sede' => $this->sede,
            'nombrenegocio' => $this->nombrenegocio,
            'ciudadnegocio' => $this->ciudadnegocio,
            'rubro' => $this->rubro,
            'pagos' => implode(',', $this->pagos),
            'despacho' => $this->despacho,
            'condiciones' => $this->condiciones,
            'atencion' => $this->atencion,
            'correo' => $this->correo,
            'direccion' => $this->direccion,
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
            'descripcion' => $this->descripcion
        ];
        $email = 'mercadoemprendedor@upv.cl';
        Mail::to($this->correo)->cc($email)->send(new UnirseAdmin($mensaje));

        session()->flash('success', 'Tus datos fueron enviados satisfactoriamente, en breve nos pondremos en contacto con usted');
        return redirect()->to('/unirse');

        
    }
    public function render()
    {
        return view('livewire.unirse');
    }
}
