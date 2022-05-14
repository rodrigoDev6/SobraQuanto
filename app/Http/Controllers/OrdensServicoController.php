<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use Illuminate\Http\Request;

class OrdensservicoController extends Controller
{
    public function index(){
        return view('ordensServico.index');
    }
}
