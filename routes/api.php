<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});



Route::get('/usuarios', [UserController::class,'index']); //muestra todos los usuarios
Route::post('/usuarios', [UserController::class,'store']); // crea un usuario
Route::post('/usuario/{id}', [UserController::class,'update']); //recibiendo los datos de request para actualizar
Route::put('/usuario/{id}', [UserController::class,'update']); // actualiza un usuario
Route::delete('/usuario/{id}', [UserController::class,'destroy']); //elimina un usuario


Route::post('/mensaje', [MessageController::class,'sendMessage']);
Route::post('/mostrar_mensajes', [MessageController::class,'showMessages']);
Route::get('/mostrar_mensajes', [MessageController::class,'showMessages']);
Route::post('/subir_archivo', [MessageController::class,'sendFile']);
