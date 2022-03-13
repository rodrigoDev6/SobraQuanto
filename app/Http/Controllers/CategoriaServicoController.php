<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaServicoController extends Controller
{
    public function index(){
        return view('categoriaServiço.index');
    }
}
