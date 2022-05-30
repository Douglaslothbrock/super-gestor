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

use App\Http\Middleware\LogAcessoMiddleware;
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

Route::get('/', [PrincipalController::class, 'index'])->name('site.index')->middleware('log.acesso');

Route::get('/sobre-nos', [SobrenosController::class, 'index'])->name('site.sobre-nos');
Route::get('/contato', [ContatoController::class, 'index'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'store'])->name('site.contato.store');

// Route::get('/login', function() {return 'login';})->name('site.login');
Route::get('/login/{error?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');

//APP's
Route::middleware('autenticacao:padrao')->prefix('/app')->group(function() {
    Route::get('/home', [HomeController::class, 'index'])->name('app.home');
    Route::get('/sair', [LoginController::class, 'sair'])->name('app.sair');
    Route::get('/clientes', [ClientesController::class, 'index'])->name('app.cliente');
    Route::get('/fornecedores', [FornecedoresController::class, 'index'])->name('app.fornecedore');
    Route::get('/produtos', [ProdutosController::class, 'index'])->name('app.produto');
});

Route::fallback( function() {
    echo 'A rota que deseja acessar não existe... <a href="/">Click aqui</a> para retornar ao início';
});

