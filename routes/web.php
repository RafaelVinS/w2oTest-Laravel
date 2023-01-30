<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColaboradoresController;
use App\Http\Controllers\EmpresasController;

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

Route::resource('colaboradores', ColaboradoresController::class);
Route::resource('empresas', EmpresasController::class);

Route::get('/', function () {
    return view('welcome');
});
