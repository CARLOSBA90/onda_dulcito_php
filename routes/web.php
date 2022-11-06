<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DropzoneController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});



//-------------SECCIONES-----------------------//
Route::get('/seccion', function () { return view('seccion.index'); });

//------------------------------------------//


//-------------RECETAS-----------------------//
Route::resource('recetas','App\Http\Controllers\RecetaController');
Route::get('/recetas/enable/{id}', 'App\Http\Controllers\RecetaController@enable');
Route::get('/recetas/imagen/{id}/{nombre}/{descripcion}', 'App\Http\Controllers\RecetaController@imagen');

//------------------------------------------//

//-------------IMAGENES-----------------------//
Route::get('dropzone', [DropzoneController::class, 'dropzone']);
Route::post('dropzone/store', [DropzoneController::class, 'dropzoneStore'])->name('dropzone.store');


//------------------------------------------//


//-------------MIDDLEWARE-------------------//
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'

])->group(function () {


    Route::get('/dash', function () {
        return view('dash.index');
    })->name('dash');




});

//------------------------------------------//


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
