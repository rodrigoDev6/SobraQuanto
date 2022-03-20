<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //listando

        $categoria = Categoria::orderby('Nome', 'ASC')->get();
        return view('categoria.index',['categorias'=>$categoria]);
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
     * @param \App\Models\Categoria $categoria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categoria.show',['categoria' => $categoria]);
        
    }

    //aqui estou
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categoria.edit', ['categoria' => $categoria]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\Categoria $categoria
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
        
        $categoria = Categoria::findOrFail($request->id);
        $categoria->nome = $request -> nome;
        $categoria->save();
    
        return redirect('/categoria')->with('status', 'Categoria alterada com sucess!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return redirect('/categoria')->with('status', 'categoria excluida com sucesso');
    }
}