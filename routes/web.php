<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PrincipalController,
    SobrenosController,
    ContatoController
};

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

Route::get('/', [PrincipalController::class, 'index'])->name('principal.index');

Route::get('/sobre-nos', [SobrenosController::class, 'index'])->name('sobre-nos.index');

Route::get('/contato', [ContatoController::class, 'index'])->name('Contato.index');
