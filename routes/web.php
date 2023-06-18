<?php

use App\Http\Controllers\AuthController;
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

Route::middleware(['guest'])->group(function () {
  Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'geraPaginaLogin');
    Route::get('/cadastro', 'geraPaginaCadastro');
    Route::post('/login', 'login')->name('login');
    Route::post('/cadastro', 'cadastro')->name('cadastro');
  });
});

Route::middleware(['auth'])->group(function () {
  Route::controller(AuthController::class)->group(function () {
    Route::post('/logout', 'logout')->name('logout');
  });

  Route::get('/', function () {
    return view('pages.home');
  });
});
