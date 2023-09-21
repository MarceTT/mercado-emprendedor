<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Model\Emprendedor;
use App\Model\Categoria;
use App\Model\Sede;
use Auth;

class EmprendedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('emprendedores.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        $sedes = Sede::all();
        return view('emprendedores.create', compact('categorias','sedes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $emprendedor = new Emprendedor();
        $emprendedor->categoria_id = $request->categoria;
        $emprendedor->nombre_proyecto = $request->nombre;
        $emprendedor->sede = $request->sede;
        $emprendedor->equipo = $request->equipo;
        $emprendedor->contacto = $request->contacto;
        $emprendedor->resumen = $request->resumen;
        $emprendedor->url_video = $request->video;
        $carpeta = 'imagenes/'.str_slug($request->nombre, "_").'_'.date('his');
        $destinationPath = $carpeta;
        $emprendedor->carpeta = $destinationPath;

        if(!empty($request->file('imagen'))){
        $imagen_chica = $request->file('imagen');
        $filename_chica = $imagen_chica->getClientOriginalName();
        $upload_success = $imagen_chica->move($destinationPath, $filename_chica);
        $emprendedor->imagen = $carpeta.'/'.$filename_chica;
        }
        if(!empty($request->file('grande'))){
        $imagen_grande = $request->file('grande');
        $filename_grande = $imagen_grande->getClientOriginalName();
        $upload_success2 = $imagen_grande->move($destinationPath, $filename_grande);
        $emprendedor->imagen_grande = $carpeta.'/'.$filename_grande;
        }
        if(!empty($request->file('logo'))){
        $imagen_logo = $request->file('logo');
        $filename_logo = $imagen_logo->getClientOriginalName();
        $upload_success3 = $imagen_logo->move($destinationPath, $filename_logo);
        $emprendedor->logo = $carpeta.'/'.$filename_logo;
        }
        if(!empty($request->input('estado'))){
            $emprendedor->estado = $request->estado;
        }else{
            $emprendedor->estado = 0;

        }
        $emprendedor->save();

        return [
            'message' => 'success'
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $id_decrypt = Crypt::decrypt($id);
            $categorias = Categoria::all();
            $sedes = Sede::all();
            $emprendedores = Emprendedor::findOrFail($id_decrypt);
        } catch (\Exception $exception) {
            return redirect()->back();
        }
        
        return view('emprendedores.edit', compact('emprendedores', 'categorias','sedes'));

    }


    public function actualizar(Request $request)
    {
            $id = $request->id;
            $empre = Emprendedor::find($id);
            $empre->categoria_id = $request->categoria;
            $empre->nombre_proyecto = $request->nombre;
            $empre->sede = $request->sede;
            $empre->equipo = $request->equipo;
            $empre->contacto = $request->contacto;
            $empre->resumen = $request->resumen;
            $empre->url_video = $request->video;
            $carpeta = $request->carpeta;
            $destinationPath = $carpeta;
            if(!empty($request->file('grande'))){
            $empre->carpeta = $destinationPath;
            $imagen_grande = $request->file('grande');
            $filename_grande = $imagen_grande->getClientOriginalName();
            $upload_success = $imagen_grande->move($destinationPath, $filename_grande);
            $empre->imagen_grande = $carpeta.'/'.$filename_grande;
            }
            if(!empty($request->file('imagen'))){
            $empre->carpeta = $destinationPath;
            $imagen = $request->file('imagen');
            $filename = $imagen->getClientOriginalName();
            $upload_success2 = $imagen->move($destinationPath, $filename);
            $empre->imagen = $carpeta.'/'.$filename;
            }
            if(!empty($request->file('logo'))){
            $empre->carpeta = $destinationPath;
            $imagen_logo = $request->file('logo');
            $filename_logo = $imagen_logo->getClientOriginalName();
            $upload_success3 = $imagen_logo->move($destinationPath, $filename_logo);
            $empre->logo = $carpeta.'/'.$filename_logo;
            }
            if(!empty($request->input('estado'))){
                $empre->estado = $request->estado;
                
            }else{
                $empre->estado = 0;
    
            }
            $empre->save();

            
    
            return [
                'message' => 'success'
              ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emprendedor = Emprendedor::findOrFail($id);
        $files = glob($emprendedor->carpeta.'/*'); //obtenemos todos los nombres de los ficheros
        foreach($files as $file){
            if(is_file($file))
            unlink($file); //elimino el fichero
        }
        rmdir($emprendedor->carpeta);

        $emprendedor = Emprendedor::find($id);
        $emprendedor->delete();

        

        return [
          'message' => 'success'
        ];
    }

    public function getTableEmprendedores()
    {
        
        $emprendedores = Emprendedor::with('categoria')->get();
        return Datatables()->of($emprendedores)
        ->addColumn('imagen', function ($emprendedores) {
            return '<img src="'.$emprendedores->imagen.'" width="60" height="60" />'; 
        })
        ->addColumn('acciones', function ($emprendedores) {
                return '<a href="'. route('emprendedor.edit', Crypt::encrypt($emprendedores->id)) .'" class="btn btn-outline-primary btn-sm"> <i class="fa fa-pencil"></i></a>
                <button type="button" class="btn btn-outline-danger btn-sm" onclick="Eliminar('.$emprendedores->id.')"><i class="fa fa-trash-o"></i></button> ';
            })
        ->rawColumns(['acciones','imagen'])
        ->toJson();

        
    }
}
