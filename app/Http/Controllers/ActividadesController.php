<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Model\Actividad;
use Auth;

class ActividadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('actividades.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('actividades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $actividad = new Actividad();
        $actividad->nombre = $request->nombre;
        $actividad->detalle_actividad = $request->detalles;
        $actividad->fecha = $request->fecha;
        $actividad->hora_inicio = $request->hora_inicio;
        $actividad->hora_termino = $request->hora_fin;
        $actividad->save();

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
            $actividades = Actividad::findOrFail($id_decrypt);
            //dd($categorias);
            //exit();
        } catch (\Exception $exception) {
            return redirect()->back();
        }
        
        return view('actividades.edit', compact('actividades'));
    }

    public function actualizar(Request $request)
    {
            $id = $request->id;
            $acti = Actividad::find($id);
            $acti->nombre = $request->nombre;
            $acti->detalle_actividad = $request->detalles;
            $acti->fecha = $request->fecha;
            $acti->hora_inicio = $request->hora_inicio;
            $acti->hora_termino = $request->hora_fin;
            $acti->save();
    
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
         $actividad = Actividad::find($id);
         $actividad->delete();

        return [
          'message' => 'success'
        ];
    }

    public function getTableActividades()
    {
        
        $actividades = Actividad::all();
        return Datatables()->of($actividades)
        ->addColumn('acciones', function ($actividades) {
                return '<a href="'. route('actividad.edit', Crypt::encrypt($actividades->id)) .'" class="btn btn-outline-primary btn-sm"> <i class="fa fa-pencil"></i></a>
                        <button type="button" onclick="Eliminar('.$actividades->id.')" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash-o"></i></button>';
            })
        ->rawColumns(['acciones'])
        ->toJson();
    }
}
