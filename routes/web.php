<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return redirect()->route('login');
})->name('redirect_login');

Route::get('/main', [UserController::class, 'maquinas'])->name('landing');

Route::get('/test', function () {
    return view('test');
})->name('test');


// TODO: renombrar ruta
Route::get('/welcome', function () {
    return view('WelcomeHome');
})->name('welcome');

Route::get('/editusuario', function () {
    return view('editarusuario');
})->name('usuario.editview');

Route::get('/mantenimiento', function () {
    return view('mantenimientoAdmin');
});

Route::get('/orden_manto', function () {
    return view('orden_mantenimiento');
});
Route::get('/detalles_maquina', function () {
    return view('detalles_maquina');
});

//Rutas para usuarios xd:
Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('usuarios.login');

Route::get('/logout',[UserController::class, 'logout'])->name('logout');


//TODO: agregar contenido, hacia llamada a vista inexistente
Route::get('/usuarios/create', [UserController::class, 'create'])->name('usuarios.create');
