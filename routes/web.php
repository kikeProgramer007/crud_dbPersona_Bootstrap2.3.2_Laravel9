<?php

use App\Http\Controllers\PersonaController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('frmpersona');
// });
 //Route::get('/','PersonaController@index');  //IR AL CONTROLADOR PERSONA-CONTROLLER Y USAR METODO INDEX

 Route::get('/', [PersonaController::class, 'index']);
 Route::post('/registrar', [PersonaController::class, 'store']);
 Route::delete('/eliminar/{id}', [PersonaController::class, 'destroy']);
//   Route::get('/eliminar/{id}', [PersonaController::class, 'destroy']);
 Route::get('/editar/{id}', [PersonaController::class, 'edit']);
 Route::put('/actualizar/{id}', [PersonaController::class, 'update']);

/*
 Route::delete('persona/{id}', function ($id) {
     
 });*/
 Route::get('product/eliminar/{id}', [PersonaController::class, 'eliminar']);