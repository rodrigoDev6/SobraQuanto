<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Venda;
use App\Models\VendaProduto;

class PdvController extends Controller
{
    public function index(){
        $produtos = Produto::orderby('id', 'ASC')->get();
        return view('pdv.index',['produtos' => $produtos]);
    }
}
