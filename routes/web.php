<?php

use App\Http\Controllers\CargosController;
use App\Http\Controllers\CategoriaProdutoController;
use App\Http\Controllers\CategoriaServicoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\financeiroController;
use App\Http\Controllers\OrdensServicoController;
use App\Http\Controllers\PdvController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProdutoController;
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

Route::get('/cliente/create', [ClienteController::class,'create'])->name('cliente.create');
Route::post('/cliente/create', [ClienteController::class,'store'])->name('cliente.store');

Route::get('/cliente/{id}', [ClienteController::class,'show'])->name('cliente.show');

Route::get('/cliente/{id}/edit', [ClienteController::class,'edit'])->name('cliente.edit');
Route::put('/cliente/{id}', [ClienteController::class,'update'])->name('cliente.update');


//--------------- SERVICOS ---------------//
Route::get('categoriaServico', [CategoriaServicoController::class, 'index'])->name('categoriaServico');

Route::get('/categoriaServico/create', [CategoriaServicoController::class,'create'])->name('categoriaServico.create');
Route::post('/categoriaServico/create', [CategoriaServicoController::class,'store'])->name('categoriaServico.store');

Route::get('/categoriaServico/{id}', [CategoriaServicoController::class,'show'])->name('categoriaServico.show');

Route::get('/categoriaServico/{id}/edit', [CategoriaServicoController::class,'edit'])->name('categoriaServico.edit');
Route::put('/categoriaServico/{id}', [CategoriaServicoController::class,'update'])->name('categoriaServico.update');


//--------------- PRODUTOS ---------------//
Route::get('produto',[ProdutoController::class, 'index'])->name('produto');

Route::get('/produto/create',[ProdutoController::class,'create'])->name('produto.create');
Route::post('/produto/create',[ProdutoController::class,'store'])->name('produto.store');

Route::get('/produto/{id}',[ProdutoController::class,'show'])->name('produto.show');

Route::get('/produto/{id}/edit',[ProdutoController::class,'edit'])->name('produto.edit');
Route::put('/produto/{id}',[ProdutoController::class, 'update'])->name('produto.update');

Route::delete('/produto/{id}',[ProdutoController::class, 'destroy'])->name('produto.destroy');

//--------------- FINANCEIRO ---------------//
Route::get('financeiro', [FinanceiroController::class, 'index'])->name('financeiro');



//--------------- SERVICOS ---------------//
Route::get('ordens/servicos', [OrdensServicosController::class, 'index'])->name('ordens/servicos');

//--------------- PDV ---------------//
Route::get('pdv', [PdvController::class, 'index'])->name('pdv');