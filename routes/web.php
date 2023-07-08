<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransacaoController;
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
  Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

  Route::controller(TransacaoController::class)->group(function () {
    Route::get('/', 'geraPaginaHome');
    Route::get('/extrato', 'geraPaginaHome');
    Route::get('/pagamentos', 'geraPaginaPagamentos');
    Route::get('/transferencias', 'geraPaginaTransferencias');
    Route::get('/chaves_pix', 'geraPaginaChavesPix');
    Route::post('/chaves_pix', 'cadastraChavePix')->name('cadastraChavePix');
    Route::post('/pagar', 'pagar')->name('pagar');
  });
});
