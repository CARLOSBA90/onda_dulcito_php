<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receta;
use App\Models\Imagen;
use App\Services\RecetaService;


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
         return view('receta.create')->with('randomID', RecetaService::randomID());
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

        RecetaService::actualizarID(
                          $request->get('id'), 
                          RecetaService::guardar($request)); /// primero guarda, luego actualiza

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
    public function update(Request $request, $id)
    {  
        $this->validation($request);

        RecetaService::actualiza($request,$id);

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

    
    public function imagen($id,$nombre,$descripcion)
    {
      /// T0D0, VALIDACION PARA NO RE-INSERTAR UNA IMAGEN DOS VECES EN BBDD(CONTROLADO EN JAVASCRIPT)
        $imagen = new Imagen();
        $imagen->name = $nombre;
        $imagen->receta_id = $id;
        $imagen->descripcion = "Nombre original del archivo ".$descripcion.", Insertado en la fecha ".date('Y-m-d H:i:s');
        $imagen->enabled = true;    
        $imagen->save();
        return 1;
    }
}
