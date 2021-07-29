<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AController;

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
//Route::post|get("endpoint|final de la url",[controlador::class,"metodo"])

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("marcas/get",[AController::class,"getMarcas"]);


Route::get("comidas/get",[AController::class,"getComidas"]);
Route::get("comidas/post",[AController::class,"crearComida"]);
