<?php

namespace App\Http\Controllers;

use App\Models\CategoriaProduto;
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


/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriaProduto = CategoriaProduto::orderBy('Nome', 'ASC')->pluck('Nome','id');
        return view('produto.create',['categoriaProduto'=>$categoriaProduto]);
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
            'nome.required' => 'O campo :attribute é obrigatório!',
            'valor.required' => 'O campo :attribute é obrigatório!',

            // 'complemento.required' => 'O campo Complemento é obrigatório!',

            'nome.min' => 'O :attribute precisa ter no mínimo :min.',
            'valor.min' => 'O :attribute precisa ter no mínimo :min.'
        ];

        $validate = $request->validate([
            'nome' => 'required|min:2',
            'valor' => 'required|min:1' ,

            // 'complemento' => 'required|min:3'
        ], $messages);

        $produto = new Produto;

        $produto -> nome = $request -> nome;
        $produto -> categoria_id = $request -> categoria_id;
        $produto -> valor = $request -> valor;


        $produto->save();


        return redirect('/produto')->with('status', 'Produto criado com sucesso!!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Produto $produto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::findOrFail($id);
        return view('produto.show',['produto' => $produto]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        $categoriaProduto = CategoriaProduto::orderBy('Nome', 'ASC')->pluck('Nome','id');
        return view('produto.edit', ['produto' => $produto,'categoriaProduto'=>$categoriaProduto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\Produto $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'nome.required' => 'O campo :attribute é obrigatório!',
            'valor.required' => 'O campo :attribute é obrigatório!',

            // 'complemento.required' => 'O campo Complemento é obrigatório!',

            'nome.min' => 'O :attribute precisa ter no mínimo :min.',
            'valor.min' => 'O :attribute precisa ter no mínimo :min.'
        ];

        $validate = $request->validate([
            'nome' => 'required|min:2',
            'valor' => 'required|min:1' ,

            // 'complemento' => 'required|min:3'
        ], $messages);
        $produto = Produto::findOrFail($request->id);
        $produto->nome = $request -> nome;
        $produto -> categoria_id = $request -> categoria_id;
        $produto -> valor = $request -> valor;
        $produto->save();

        return redirect('/produto')->with('status', 'Produto alterado com sucesso!!');
    }






}
