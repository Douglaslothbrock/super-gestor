<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PrincipalController,
    SobrenosController,
    ContatoController,
    ClientesController,
    ProdutosController,
    FornecedoresController,
    LoginController
};
use Illuminate\Routing\Route as RoutingRoute;

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

Route::get('/', [PrincipalController::class, 'index'])->name('site.index');

Route::get('/sobre-nos', [SobrenosController::class, 'index'])->name('site.sobre-nos');

Route::get('/contato', [ContatoController::class, 'index'])->name('site.contato');

Route::get('/login', [LoginController::class, 'index'])->name('site.login');


//APP's
Route::group(['prefix'=>'/app'], function(){
    Route::get('/clientes', [ClientesController::class, 'index'])->name('app.clientes');
    Route::get('/fornecedores', [FornecedoresController::class, 'index'])->name('app.fornecedores');
    Route::get('/produtos', [ProdutosController::class, 'index'])->name('app.produtos');
});

Route::fallback( function() {
    echo 'A rota que deseja acessar não existe... <a href="/">Click aqui</a> para retornar ao início';
});

