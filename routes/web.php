<?php

use App\Http\Controllers\CargosController;
use App\Http\Controllers\CategoriaProdutoController;
use App\Http\Controllers\CategoriaServicoController;
use App\Http\Controllers\ClienteController;
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
    return view('home');
});

Auth::routes();

//--------------- HOME ------------//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('teste', [SiteController::class, 'teste']);

//--------------- USUAIROS ------------//
Route::get('usuarios', [UsuariosController::class, 'index'])->name('usuarios');

//--------------- PERMISSOES ---------------//
Route::get('permissoes', [PermissionController::class, 'index'])->name('permissoes');

//--------------- CARGOS ---------------//
Route::get('cargos', [CargosController::class, 'index'])->name('cargos');

//--------------- CLIENTE ---------------//
Route::get('/cliente', [ClienteController::class,'index'])->name('cliente');

Route::get('/cliente/{id}', [ClienteController::class,'show'])->name('cliente.show');

Route::get('/cliente/{id}/edit', [ClienteController::class,'edit'])->name('cliente.edit');
Route::put('/cliente/{id}', [ClienteController::class,'update'])->name('cliente.update');


//--------------- SERVICOS ---------------//
Route::get('categorias/servicos', [CategoriaServicoController::class, 'index'])->name('categorias/servicos');

//--------------- PRODUTOS ---------------//
Route::get('categorias/produtos', [CategoriaProdutoController::class, 'index'])->name('categorias/produtos');

//--------------- FINANCEIRO ---------------//
Route::get('financeiro', [FinanceiroController::class, 'index'])->name('financeiro');

//--------------- PRODUTOS ---------------//
Route::get('produtos',[ProdutosController::class, 'index'])->name('produtos');

//--------------- SERVICOS ---------------//
Route::get('ordens/servicos', [OrdensServicosController::class, 'index'])->name('ordens/servicos');

//--------------- PDV ---------------//
Route::get('pdv', [PdvController::class, 'index'])->name('pdv');