<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Message\MessageShowController;
use App\Http\Controllers\Message\MessageSendController;
use App\Http\Controllers\User\UserStoreController;
use App\Http\Controllers\User\UserUpdateController;
use App\Http\Controllers\User\UserDestroyController;
use App\Http\Controllers\User\UserShowController;

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


//------------------------------------------------------------------------------
Route::post('/store-user', UserStoreController::class); // crea un usuario
Route::get('/show-user', UserShowController::class); //muestra todos los usuarios
Route::post('/update-user/{id}', UserUpdateController::class); //recibiendo los datos de request para actualizar
Route::put('/update-user/{id}', UserUpdateController::class); // actualiza un usuario
Route::delete('/delete-user/{id}', UserDestroyController::class); //elimina un usuario


Route::post('/send-messages', MessageSendController::class); // envia el mensaje
Route::get('/show-messages', MessageShowController::class); //muestra los mensajes paginados de a 15 por pagina
//Route::post('/upload-file', MessageSendController::class);// subir el archivo relacionado con los mensajes