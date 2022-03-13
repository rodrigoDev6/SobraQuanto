<?php

use App\Http\Controllers\CargosController;
use App\Http\Controllers\CategoriaProdutoController;
use App\Http\Controllers\CategoriaServicoController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\financeiroController;
use App\Http\Controllers\OrdensServicosController;
use App\Http\Controllers\OrdensServiçoController;
use App\Http\Controllers\PdvController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('teste', [SiteController::class, 'teste']);

Route::get('permissoes', [PermissionController::class, 'index'])->name('permissoes');

Route::get('cargos', [CargosController::class, 'index'])->name('cargos');

Route::get('clientes', [ClientesController::class,'index'])->name('clientes');

Route::get('categorias/servicos', [CategoriaServicoController::class, 'index'])->name('categorias/servicos');

Route::get('categorias/produtos', [CategoriaProdutoController::class, 'index'])->name('categorias/produtos');

Route::get('financeiro', [FinanceiroController::class, 'index'])->name('financeiro');

Route::get('produtos',[ProdutosController::class, 'index'])->name('produtos');

Route::get('ordens/servicos', [OrdensServicosController::class, 'index'])->name('ordens/servicos');

Route::get('pdv', [PdvController::class, 'index'])->name('pdv');

Route::get('usuarios', [UsuariosController::class, 'index'])->name('usuarios');

