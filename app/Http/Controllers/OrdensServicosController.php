<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdensServicosController extends Controller
{
    public function index(){
        return view('OrdensServico.index');
    }
}
