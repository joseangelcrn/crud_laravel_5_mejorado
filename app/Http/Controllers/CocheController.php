<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coche;
use Illuminate\Support\Facades\File;

class CocheController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $coches = Coche::where('propietario',auth()->user()->id)->get();
        // $coches  = Coche::all();
        return view('coche.listar',compact('coches'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('coche.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'matricula'=>'required|unique:coches',
            'marca'=>'required',
            'modelo'=>'required',
            'precio'=>'required',
        ]);
        //
        $usuario = auth()->user();
        $coche = new Coche();

        $coche->matricula = $request->matricula;
        $coche->marca = $request->marca;
        $coche->modelo = $request->modelo;
        $coche->precio = $request->precio;
        $coche->propietario = $usuario->id;
        if ($request->imagen != null) {
            $imageName = time().'.'.$request->imagen->getClientOriginalExtension();
            $request->imagen->move(public_path('imagenes'), $imageName);
            $coche->imagen = $imageName;
        }
        
        $coche->save();

        return back()->with('mensaje','Coche añadido correctamente');
        
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
        $coche = Coche::findOrFail($id);

        return view('coche.ver',compact('coche'));
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
        $coche = Coche::findOrFail($id);

        return view('coche.editar',compact('coche'));
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
        $validateData = $request->validate([
            'matricula' => 'required|unique:coches,matricula,'.$id,
            'marca'=>'required',
            'modelo'=>'required',
            'precio'=>'required'
        ]);
        //
        $cocheActualizar = Coche::findOrFail($id);
        
        $cocheActualizar->matricula = $request->matricula;
        $cocheActualizar->marca = $request->marca;
        $cocheActualizar->modelo = $request->modelo;
        $cocheActualizar->precio = $request->precio;
        
        if ($cocheActualizar->imagen != null) {
            //borrar la imagen almacenada
            $nombreImagen = $cocheActualizar->imagen;
            $dir = '/imagenes/'.$nombreImagen;
            File::delete(public_path($dir));
        }

        
        if ($request->imagen != null) {
            //settear lo que reciba de request
            $imageName = time().'.'.$request->imagen->getClientOriginalExtension();
            $request->imagen->move(public_path('imagenes'), $imageName);
            $cocheActualizar->imagen = $imageName;
        }
        else {
            $cocheActualizar->imagen = null;
        }

        // return $request->imagen;
        $cocheActualizar->save();
        return redirect()->route('coche.show',$cocheActualizar->id)->with('mensaje','Coche actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cocheEliminar = Coche::findOrFail($id);
        $cocheEliminar->delete();

        return redirect('coche')->with('mensaje','Coche eliminado correctamente');

    }
}
