<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CargosController;
use App\Http\Controllers\CategoriaProdutoController;
use App\Http\Controllers\CategoriaServicoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\financeiroController;
use App\Http\Controllers\ordensServicoController;
use App\Http\Controllers\PdvController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SiteController;
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

//--------------- PDV ---------------//
Route::get('pdv', [PdvController::class, 'index'])->name('pdv.index');

Route::get('/carrinho', [PdvController::class, 'carrinho'])->name('pdv.carrinho');

Route::get('/adicionarProduto/{id}', [PdvController::class, 'show'])->name('pdv.show');
Route::post('/addProduto', [PdvController::class, 'addProduto'])->name('pdv.addProduto');
Route::delete('/removeProduto/{key}',[PdvController::class,'removeProduto'])->name('removeProduto');

Route::post('/concluirVenda', [PdvController::class, 'concluirPedido'])->name('pdv.concluirVenda');

//--------------- HOME ------------//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('teste', [SiteController::class, 'teste']);

//--------------- USUARIOS ------------//
Route::get('usuarios', [UserController::class, 'index'])->name('usuarios');

Route::get('usuarios/create', [UserController::class, 'create'])->name('usuarios.create');
Route::post('usuarios/create', [UserController::class, 'store'])->name('usuarios.store');

Route::get('/usarios/{id}', [UserController::class, 'show'])->name('usuarios.show');

Route::get('usuarios/{id}/edit', [UserController::class, 'edit'])->name('usuarios.edit');
Route::put('usuarios/{id}/update', [UserController::class, 'update'])->name('usuarios.update');

Route::delete('usuarios/{id}/destroy', [UserController::class, 'destroy'])->name('usuarios.destroy');


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

Route::delete('/categoriaServico/{id}', [CategoriaServicoController::class, 'destroy'])->name('categoriaServico.destroy');


//--------------- Categoria Produtos ---------------//
Route::get('categoriaProduto', [CategoriaProdutoController::class, 'index'])->name('categoriaProduto');

Route::get('/categoriaProduto/create', [CategoriaProdutoController::class,'create'])->name('categoriaProduto.create');
Route::post('/categoriaProduto/create', [CategoriaProdutoController::class,'store'])->name('categoriaProduto.store');

Route::get('/categoriaProduto/{id}', [CategoriaProdutoController::class,'show'])->name('categoriaProduto.show');

Route::get('/categoriaProduto/{id}/edit', [CategoriaProdutoController::class,'edit'])->name('categoriaProduto.edit');
Route::put('/categoriaProduto/{id}', [CategoriaProdutoController::class,'update'])->name('categoriaProduto.update');

Route::delete('/categoriaProduto/{id}', [CategoriaProdutoController::class, 'destroy'])->name('categoriaProduto.destroy');

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
Route::get('ordensServico', [OrdensServicoController::class, 'index'])->name('ordensServico');

Route::get('/ordensServico/create',[OrdensServicoController::class,'create'])->name('ordensServico.create');
Route::post('/ordensServico/create',[OrdensServicoController::class,'store'])->name('ordensServico.store');

Route::get('/ordensServico/{id}',[OrdensServicoController::class,'show'])->name('ordensServico.show');

Route::get('/ordensServico/{id}/edit',[OrdensServicoController::class,'edit'])->name('ordensServico.edit');
Route::put('/ordensServico/{id}',[OrdensServicoController::class, 'update'])->name('ordensServico.update');

Route::delete('/ordensServico/{id}',[OrdensServicoController::class, 'destroy'])->name('ordensServico.destroy');



