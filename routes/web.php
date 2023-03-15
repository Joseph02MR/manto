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
    return view('template');
})->name('template');

Route::get('/welcome', function () {
    return view('WelcomeHome');
});

//Rutas para usuarios xd:
Route::get('/usuarios', [UserController::class, 'index']);
<<<<<<< HEAD
Route::get('/usuarios/create', [UserController::class, 'create'])->name('usuarios.create');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login',[UserController::class,'login'])->name('usuarios.login');
Route::get('/usuarios/create', [UserController::class, 'create'])->name('usuarios.create');


=======
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login',[UserController::class,'login'])->name('usuarios.login');

>>>>>>> d929d4b7f4b5c5c52d0390d8d03faf16b98a64ac
