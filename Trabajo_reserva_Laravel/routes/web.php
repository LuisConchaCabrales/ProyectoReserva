<?php

use App\Http\Controllers\PortatilController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get("/ejemplo",function(){return view("ejemplo");});

Route::post("/usuario/{usuario}/crear",[UserController::class,"store"])->name("usuario.crear");

Route::post("/portatil/{portatil}/crear",[PortatilController::class,"store"])->name("usuario.crear");

Route::post("/reserva/{reserva}/crear",[ReservaController::class,"store"])->name("usuario.crear");

Route::get("/reservas",[ReservaController::class,"index"])->name("vistas.resrvas");

Route::get("/registro",[UserController::class,"index"])->name("vistas.resreva");


//Route::get('/reservas',[ReservaController::class,"index"])->name("vistas.reservas")->middleware("auth");


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
