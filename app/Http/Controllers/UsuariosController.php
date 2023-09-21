<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Usuario;
use Auth;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usuarios.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $usuario = Usuario::find($id);
        return response()->json($usuario);
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
        $id = $request->id;
          $usuarios = Usuario::find($id);
          $usuarios->name = $request->nombre;
          if(!empty($request->tipos)){
            $usuarios->type = $request->tipos; 
            }
            if(!empty($request->access)){
                $usuarios->access = $request->access; 
                
            }else{
                $usuarios->access = 0;
            }
            $usuarios->save();

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
        $usuario = Usuario::find($id);
         $usuario->delete();

        return [
          'message' => 'success'
        ];
    }

    public function getTableUsuarios()
    {
        
        $usuario = Usuario::all();
        return Datatables()->of($usuario)
        ->editColumn('access', '@if($access)
                  <span class="badge badge-success"><i class="fa fa-check"></i> Activado</span> 
                @else
                   <span class="badge badge-danger"><i class="fa fa-times"></i> Descativado</span> 
                @endif')
        ->editColumn('type', '@if($type == "admin")
                  <span class="badge badge-info"><i class="fa fa-check"></i> Administrador</span> 
                @else
                   <span class="badge badge-light"><i class="fa fa-check"></i> Usuario</span> 
                @endif') 
        ->addColumn('acciones', function ($usuario) {
                return '<button type="button" onclick="Editar('.$usuario->id.')" data-toggle="modal" data-target="#editModalAvance" class="btn btn-outline-primary btn-sm"> <i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Editar Usuario"></i></button>
                        <button type="button" onclick="Eliminar('.$usuario->id.')" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="Eliminar Usuario"></i></button>';
            })
        ->rawColumns(['acciones','access','type'])
        ->toJson();
    }
}
