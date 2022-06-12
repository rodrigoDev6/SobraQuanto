<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use Illuminate\Http\Request;

class OrdemDeServicoController extends Controller
{
    public function index(){
        return view('ordemDeServico.index');
    }
}
