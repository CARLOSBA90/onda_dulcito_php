<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receta;

class RecetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recetas = Receta::all();
        return view('receta.index')->with('recetas',$recetas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('receta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validation($request);
        $receta = new Receta();
        $receta->id = $request->get('id');
        $receta->nombre = $request->get('nombre');
        $receta->descripcion = $request->get('descripcion');
        $receta->enabled = $request->get('enabled')=='1'? 1 : 0;
        $receta->published_at = $request->get('published_at');
        $receta->save();

        return redirect('/recetas');
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
       $receta = Receta::find($id);
       return view('receta.edit')->with('receta',$receta);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){  
        $this->validation($request);

        $receta = Receta::find($id);
        $receta->nombre = $request->get('nombre');
        $receta->descripcion = $request->get('descripcion');
        $receta->enabled = $request->get('enabled')=='1'? 1 : 0;
        $receta->published_at = $request->get('published_at');
        $receta->save();
        return redirect('/recetas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $receta = Receta::find($id);
        $receta->delete();
        return redirect('/recetas');
    }

    public function validation(Request $request)
    {
          $validated = $request->validate([
            'nombre' => 'required|max:300',   ///|unique:recetas /// a futuro evitar que se borren datos del form
            'descripcion' => 'required|max:4000',
        ]);
    }

    public function enable($id)
    {
        $receta = Receta::find($id);
        $receta->enabled = !$receta->enabled;
        $receta->save();
        return 1;
    }
}
