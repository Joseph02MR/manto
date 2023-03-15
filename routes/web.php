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
    return view('WelcomeHome');
})->name('template');

Route::get('/welcome', function () {
    return view('WelcomeHome');
})->name('welcome');

//Rutas para usuarios xd:
Route::get('/usuarios', [UserController::class, 'index']);

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login',[UserController::class,'login'])->name('usuarios.login');
Route::get('/usuarios/create', [UserController::class, 'create'])->name('usuarios.create');
