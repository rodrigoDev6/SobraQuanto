<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaProdutoController extends Controller
{
    public function index(){
        return view('categoriaProduto.index');
    }
}
