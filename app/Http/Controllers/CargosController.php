<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CargosController extends Controller
{
    public function index(){
        return view('cargos.index');
    }
}
