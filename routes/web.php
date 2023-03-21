<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MantoController;
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
    return redirect()->route('login');
})->name('redirect_login');

Route::get('/main', [UserController::class, 'maquinas'])->name('landing');

Route::get('/maquinas', [UserController::class, 'maquinas_admin'])->name('maquinas.admin');
Route::get('/maquinas_nueva', [UserController::class, 'editar_maquina'])->name('maquinas.new');
Route::get('/maquinas_editar', [UserController::class, 'editar_maquina'])->name('maquinas.editview');
Route::post('/editmaquinas', [UserController::class, 'update_maquina'])->name('maquinas.update');

Route::get('/test', function () {
    return view('test');
})->name('test');

Route::get('/manto', [UserController::class, 'mantos'])->name('manto');
Route::PATCH('/manto', [UserController::class, 'update_manto_status'])->name('manto.status');

Route::get('/orden_manto', function () {
    return view('orden_mantenimiento');
})->name('manto.nuevo');

Route::get('/detalles_maquina', function () {
    return view('detalles_maquina');
})->name('manto.detalle');

//Rutas para manto
Route::get('/orden_manto/{id?}', [MantoController::class, 'levantarOrden']);
Route::post('/orden',[MantoController::class,'sendOrden'])->name('manto.orden');

Route::get('/bitacora', [UserController::class, 'bitacora'])->name('bitacora');

// TODO: renombrar ruta
Route::get('/welcome', function () {
    return view('WelcomeHome');
})->name('welcome');

//Rutas para usuarios xd:
Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios');

Route::get('/usuarios/edit', [UserController::class, 'editar_usuario'])->name('usuarios.editview');
Route::post('/usuarios/update', [UserController::class, 'update'])->name('usuarios.update');
Route::get('/usuarios/new', [UserController::class, 'editar_usuario'])->name('usuarios.createview');
Route::post('/usuarios/create', [UserController::class, 'store'])->name('usuarios.new');
Route::post('/usuarios/delete',[UserController::class, 'destroy'])->name('usuarios.delete');

Route::get('/reportes', function () {
    return view('reportes');
})->name('reportes');


Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('usuarios.login');

Route::get('/logout',[UserController::class, 'logout'])->name('logout');

Route::get('/qr/{id?}', [AdminController::class, 'getqr'])->name('getqrs');
