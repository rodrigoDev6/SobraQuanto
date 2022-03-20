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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoria.create');
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
     * @param \App\Models\Clientes $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Clientes::findOrFail($id);
        return view('clientes.show',['clientes' => $cliente]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Clientes::findOrFail($id);
        return view('clientes.edit', ['clientes' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\Clientes $cliente
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
        
        $cliente = Clientes::findOrFail($request->id);
        $cliente->nome = $request -> nome;
        $cliente->save();
    
        return redirect('/cliente')->with('status', 'Categoria alterada com sucess!!');
    }

    
}
