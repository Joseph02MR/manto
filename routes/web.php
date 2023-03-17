<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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
    return view('template');
})->name('template');

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




Route::get('/dispositivo', function () {
    return view('AdDevice');
});

Route::get('/reportes', function () {
    return view('reportes');
});

//Rutas para usuarios xd:
Route::get('/usuarios', [UserController::class, 'index']);

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login',[UserController::class,'login'])->name('usuarios.login');

//TODO: agregar contenido, hacia llamada a vista inexistente
Route::get('/usuarios/create', [UserController::class, 'create'])->name('usuarios.create');

Route::get('/qr/{id?}', [AdminController::class, 'getqr'])->name('getqrs');
