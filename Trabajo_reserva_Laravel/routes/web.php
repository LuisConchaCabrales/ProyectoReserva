<?php

use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PortatilController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
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

Route::get("/",[UserController::class,"inicioSesion"]);


Route::post("/usuario/crear",[UserController::class,"store"])->name("usuario.crear");

Route::post("/portatil/crear",[PortatilController::class,"store"])->name("portatil.crear");

Route::put("/reserva/crear/{resereva}",[ReservaController::class,"store"])->name("reserva.crear");


Route::get("/registro",[UserController::class,"create"])->name("vistas.registro");

Route::post("/reservas",[ReservaController::class,"index"])->name("vistas.reservas");

Route::get("/reservas",[ReservaController::class,"index"])->name("vistas.reservas")->middleware("auth");


Route::get("/usuarios/datos",[UserController::class,"index"])->name("usuarios.datos");

Route::get("/reservas/datos",[ReservaController::class,"datos"])->name("reservas.datos");

Route::get("/portatiles/datos",[PortatilController::class,"index"])->name("portatiles.index");



Route::post('/logout', [UserController::class,'logout'])->name('logout');

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
