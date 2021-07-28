<?php

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

Route::view("/","home")->name("home");
Route::view("/agregar_A","agregar_A")->name("agregar_A");
Route::view("/agregar_B","agregar_B")->name("agregar_B");
Route::view("/ver_A","ver_A")->name("ver_A");
Route::view("/ver_B","ver_B")->name("ver_B");
