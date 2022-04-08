<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $produtos = Produto::orderby('id', 'ASC')->get();
        return view('produto.index',['produtos'=>$produtos]);
    }
}
