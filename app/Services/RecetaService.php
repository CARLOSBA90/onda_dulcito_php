<?php

namespace app\Services;
 
use App\Models\Receta;
use App\Models\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
 
class RecetaService
{

    ///GENERA DE ID TEMPORAL, AL GENERAR UNA NUEVA RECETA
    public static function randomID(){
         
         $randomID = abs(crc32(uniqid()));
        
        while(Receta::select("*")->where('id', $randomID)->exists()){
            $randomID = abs(crc32(uniqid()));
        }

        return $randomID;
    }


    ///GUARDA NUEVA RECETA, RETORNA ID
    public static function guardar(Request $request){
        
        $receta = new Receta();
        $receta->nombre = $request->get('nombre');
        $receta->descripcion = $request->get('descripcion');
        $receta->enabled = $request->get('enabled')=='1'? 1 : 0;
        $receta->published_at = $request->get('published_at');
        $receta->save();
        return $receta->id;
    }


    ///REEMPLAZA ID TEMPORAL POR ID GENERADO
    public static function actualizarID($temp_id, $id){
        Imagen::where('receta_id',$temp_id)
              ->update(['receta_id' => $id]);
    }

    ///ACTUALIZA RECETA
    public static function actualiza(Request $request, $id){

        $receta = Receta::find($id);
        $receta->nombre = $request->get('nombre');
        $receta->descripcion = $request->get('descripcion');
        $receta->enabled = $request->get('enabled')=='1'? 1 : 0;
        $receta->published_at = $request->get('published_at');
        $receta->save();

    }

}

?>