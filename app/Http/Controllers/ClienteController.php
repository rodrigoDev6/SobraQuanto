<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //listando
        $clientes = Cliente::orderby('nome', 'ASC')->get();
        return view('cliente.index',['clientes'=>$clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'nome.required' => 'O campo :attribute é obrigatório'
        ];

        $validate = $request->validate([
            'nome' => 'required|min:2'
        ], $messages);
        
        $categoria = new Categoria;
        $categoria->nome = $request -> nome;
        $categoria->save();
    
        return redirect('/categoria')->with('status', 'Categoria criada com sucess!!');
    
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('cliente.show',['cliente' => $cliente]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('cliente.edit', ['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'nome.required' => 'O campo :attribute é obrigatório'
        ];

        $validate = $request->validate([
            'nome' => 'required|min:2'
        ], $messages);
        
        $cliente = Cliente::findOrFail($request->id);
        $cliente->nome = $request -> nome;
        $cliente->save();
    
        return redirect('/cliente')->with('status', 'Categoria alterada com sucess!!');
    }

    
}