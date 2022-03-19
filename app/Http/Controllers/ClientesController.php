<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //listando
        $clientes = Clientes::orderby('nome', 'ASC')->get();
        return view('clientes.index',['clientes'=>$clientes]);
    }
}
