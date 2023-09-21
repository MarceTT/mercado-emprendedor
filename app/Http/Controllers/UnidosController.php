<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use App\Model\Unirme;
use Auth;

class UnidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('unidos.index');
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
        try {
            $id_decrypt = Crypt::decrypt($id);
            $unidos = Unirme::findOrFail($id_decrypt);
        } catch (\Exception $exception) {
            return redirect()->back();
        }
        
        return view('unidos.detalle', compact('unidos'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $unirme = Unirme::findOrFail($id);
        Storage::deleteDirectory($unirme->carpeta);

        $unirme = Unirme::find($id);
        $unirme->delete();

        

        return [
          'message' => 'success'
        ];
    }

    public function getTableUnidos()
    {
        
        $unidos = Unirme::all();
        return Datatables()->of($unidos)
        ->addColumn('imagen', function ($unidos) {
            return '<img src="'.asset('storage/'.$unidos->carpeta).'" width="60" height="60" />'; 
        })
        ->addColumn('acciones', function ($unidos) {
                return '<a href="'. route('unidos.show', Crypt::encrypt($unidos->id)) .'" class="btn btn-outline-warning btn-sm"> <i class="fa fa-eye"></i></a>
                <button type="button" onclick="Eliminar('.$unidos->id.')" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash-o"></i></button>';
            })
        ->rawColumns(['acciones','imagen'])
        ->toJson();

        
    }
}
