<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Model\Banner;
use Auth;

class BannersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('banners.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $variable = 'banners';
        $banner = new Banner();
        $carpeta = 'imagenes/banners/'.str_slug($variable, "_").'_'.date('his');
        $destinationPath = $carpeta;
        $banner->carpeta = $destinationPath;
        $imagen = $request->file('imagen');
        $filename = $imagen->getClientOriginalName();
        $upload_success = $imagen->move($destinationPath, $filename);
        $banner->imagen = $carpeta.'/'.$filename;
        $banner->save();


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
            $banners = Banner::findOrFail($id_decrypt);
            //dd($categorias);
            //exit();
        } catch (\Exception $exception) {
            return redirect()->back();
        }
        
        return view('banners.edit', compact('banners'));
    }

    public function actualizar(Request $request)
    {
            $id = $request->id;
            $bann = Banner::find($id);
            $carpeta = $request->carpeta;
            $destinationPath = $carpeta;
            if(!empty($request->file('imagen'))){
            $bann->carpeta = $destinationPath;
            $imagen = $request->file('imagen');
            $filename = $imagen->getClientOriginalName();
            $upload_success = $imagen->move($destinationPath, $filename);
            $bann->imagen = $carpeta.'/'.$filename;
            }
            $bann->save();

            
    
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
        $banners = Banner::findOrFail($id);
        $files = glob($banners->carpeta.'/*'); //obtenemos todos los nombres de los ficheros
        foreach($files as $file){
            if(is_file($file))
            unlink($file); //elimino el fichero
        }
        rmdir($banners->carpeta);

        $banner = Banner::find($id);
        $banner->delete();

        

        return [
          'message' => 'success'
        ];
    }

    public function getTableBanners()
    {
        
        $banners = Banner::all();
        return Datatables()->of($banners)
        ->addColumn('imagen', function ($banners) {
            return '<img src="'.$banners->imagen.'" width="60" height="60" />'; 
        })
        ->addColumn('acciones', function ($banners) {
                return '<a href="'. route('banner.edit', Crypt::encrypt($banners->id)) .'" class="btn btn-outline-primary btn-sm"> <i class="fa fa-pencil"></i></a>
                <button type="button" class="btn btn-outline-danger btn-sm" onclick="Eliminar('.$banners->id.')"><i class="fa fa-trash-o"></i></button> ';
            })
        ->rawColumns(['acciones','imagen'])
        ->toJson();

        
    }
}
