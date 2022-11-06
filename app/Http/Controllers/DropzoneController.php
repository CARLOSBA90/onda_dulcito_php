<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Imagen;

class DropzoneController extends Controller
{
     /**
     * Generate Image upload View
     *
     * @return void
     */
    public function dropzone()
    {
        return view('imagen.index');
    }
     
    /**
     * Image Upload Code
     *
     * @return void
     */
    public function dropzoneStore(Request $request)
    {
        $image = $request->file('file');
        $filename = uniqid();
        $imageName = $filename.'.'.$image->extension();
        $image->move(public_path('images'),$imageName);
    
        return response()->json(['success'=>$imageName]);
    }
}
