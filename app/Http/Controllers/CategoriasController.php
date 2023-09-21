<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Model\Categoria;
use Auth;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categorias.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $carpeta = 'imagenes/categorias/'.str_slug($request->nombre, "_").'_'.date('his');
        $destinationPath = $carpeta;
        $categoria->carpeta = $destinationPath;
        $imagen = $request->file('imagen');
        $filename = $imagen->getClientOriginalName();
        $upload_success = $imagen->move($destinationPath, $filename);
        $categoria->imagen = $carpeta.'/'.$filename;
        $categoria->save();


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
            $categorias = Categoria::findOrFail($id_decrypt);
            //dd($categorias);
            //exit();
        } catch (\Exception $exception) {
            return redirect()->back();
        }
        
        return view('categorias.edit', compact('categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request)
    {
            $id = $request->id_categoria;
            $cat = Categoria::find($id);
            $cat->nombre = $request->nombre;
            $cat->descripcion = $request->descripcion;
            $carpeta = $request->carpeta;
            $destinationPath = $carpeta;
            if(!empty($request->file('imagen'))){
            $cat->carpeta = $destinationPath;
            $imagen = $request->file('imagen');
            $filename = $imagen->getClientOriginalName();
            $upload_success = $imagen->move($destinationPath, $filename);
            $cat->imagen = $carpeta.'/'.$filename;
            }
            $cat->save();

            
    
            return [
                'message' => 'success'
              ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $files = glob($categoria->carpeta.'/*'); //obtenemos todos los nombres de los ficheros
        foreach($files as $file){
            if(is_file($file))
            unlink($file); //elimino el fichero
        }
        rmdir($categoria->carpeta);

        $categoria = Categoria::find($id);
        $categoria->delete();

        

        return [
          'message' => 'success'
        ];
    }

    public function getTableCategorias()
    {
        
        $categorias = Categoria::all();
        return Datatables()->of($categorias)
        ->addColumn('imagen', function ($categorias) {
            return '<img src="'.$categorias->imagen.'" width="60" height="60" />'; 
        })
        ->addColumn('acciones', function ($categorias) {
                return '<a href="'. route('categoria.edit', Crypt::encrypt($categorias->id)) .'" class="btn btn-outline-primary btn-sm"> <i class="fa fa-pencil"></i></a>
                <button type="button" class="btn btn-outline-danger btn-sm" onclick="Eliminar('.$categorias->id.')"><i class="fa fa-trash-o"></i></button> ';
            })
        ->rawColumns(['acciones','imagen'])
        ->toJson();

        
    }
}
