<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::all();
        return view('frmpersona',['personas'=>$personas]);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $personas = new Persona;                        //instancia de clase persona
        $personas->nombre = $request->nombre;           //guardamos en el atributo nombre el dato proveniente de la vista
        $personas->edad = $request->edad;               //guardamos en el atributo edad el dato  proveniente de la vista
        $personas->save();                              //Guardar datos en la base tabla
        return back()->with('agregar','Se ha registrado correctamente');
    }


    public function edit($id)
    {
        $notaActualizar = Persona::findOrFail($id);
        return view('editar',['notaActualizar'=>$notaActualizar]);
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
        $personas = Persona::findOrFail($id);
        $personas->nombre = $request->nombre;
        $personas->edad = $request->edad;
        $personas->save();
        return back()->with('update','Datos actualizados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $personas = Persona::findOrFail($id);
        $personas->delete();
        return back()->with('delete','Se ha eliminado correctamente');
        // return redirect()->route('product.index');
    }
}
