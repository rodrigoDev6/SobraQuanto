<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CargosController;
use App\Http\Controllers\CategoriaProdutoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\financeiroController;
use App\Http\Controllers\OrdemDeServicoController;
use App\Http\Controllers\PdvController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ServicoController;
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

Route::post('/fecharVenda', [PdvController::class, 'fecharVenda'])->name('pdv.fecharVenda');

Route::delete('/removeProduto/{key}',[PdvController::class,'removeProduto'])->name('pdv.removeProduto');
Route::delete('/removeCart',[PdvController::class,'removeCart'])->name('pdv.removeCart');

//--------------- ORDEM DE SERVICOS ---------------//
Route::get('/ordemDeServico', [OrdemDeServicoController::class, 'index'])->name('ordemDeServico');

Route::get('/ordemDeServico/create', [OrdemDeServicoController::class, 'create'])->name('ordemDeServico.create');

Route::post('/addServico', [OrdemDeServicoController::class, 'addServico'])->name('ordemDeServico.addServico');

Route::post('/finalizarOrdem', [OrdemDeServicoController::class, 'finalizarOrdem'])->name('ordemDeServico.finalizarOrdem');

Route::delete('/removeServico/{key}',[OrdemDeServicoController::class,'removeServico'])->name('ordemDeServico.removeServico');
Route::delete('/removeCartServico',[OrdemDeServicoController::class,'removeCartServico'])->name('ordemDeServico.removeCartServico');

//--------------- HOME ------------//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('teste', [SiteController::class, 'teste']);

//--------------- USUARIOS ------------//
Route::get('usuario', [UserController::class, 'index'])->name('usuario')->can('is_admin');

Route::get('usuario/create', [UserController::class, 'create'])->name('usuario.create')->can('is_admin');
Route::post('usuario/create', [UserController::class, 'store'])->name('usuario.store')->can('is_admin');

Route::get('/usuario/{id}', [UserController::class, 'show'])->name('usuario.show')->can('is_admin');

Route::get('usuario/{id}/edit', [UserController::class, 'edit'])->name('usuario.edit')->can('is_admin');
Route::put('usuario/{id}/update', [UserController::class, 'update'])->name('usuario.update')->can('is_admin');

Route::delete('usuario/{id}/destroy', [UserController::class, 'destroy'])->name('usuario.destroy')->can('is_admin');


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
Route::get('servico', [ServicoController::class, 'index'])->name('servico');

Route::get('/servico/create', [ServicoController::class, 'create'])->name('servico.create');
Route::post('/servico/create', [ServicoController::class, 'store'])->name('servico.store');

Route::get('/servico/{id}', [ServicoController::class,'show'])->name('servico.show');

Route::get('/servico/{id}/edit', [ServicoController::class,'edit'])->name('servico.edit');
Route::put('/servico/{id}', [ServicoController::class,'update'])->name('servico.update');

Route::delete('/servico/{id}', [ServicoController::class, 'destroy'])->name('servico.destroy');


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

