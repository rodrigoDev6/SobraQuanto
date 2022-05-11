<?php

namespace App\Http\Controllers;
use App\Models\CategoriaServico;
use Illuminate\Http\Request;

class CategoriaServicoController extends Controller
{
    public function index(){

        $categoriaServico = CategoriaServico::orderby('id', 'ASC')->get();
        return view('categoriaServico.index',['categoriaServico'=>$categoriaServico]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('categoriaServico.create');
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
            
            'nome.min' => 'O :attribute precisa ter no mínimo :min.',
            
        ];

        $validate = $request->validate([
            'nome' => 'required|min:4',

        ], $messages);
        
        $categoriaServico = new CategoriaServico;
        $categoriaServico -> nome = $request -> nome;

        $categoriaServico->save();
        
    
        return redirect('/categoriaServico')->with('status', 'Categoria criada com sucesso!!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\CategoriaServico $categoriaServico
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoriaServico = CategoriaServico::findOrFail($id);
        return view('categoriaServico.show',['categoriaServico' => $categoriaServico]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $categoriaServico
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoriaServico = CategoriaServico::findOrFail($id);
        return view('categoriaServico.edit', ['categoriaServico' => $categoriaServico]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\CategoriaServico $categoriaServico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'nome.required' => 'O campo :attribute é obrigatório!',
            
            'nome.min' => 'O :attribute precisa ter no mínimo :min.',
            
        ];

        $validate = $request->validate([
            'nome' => 'required|min:4',

        ], $messages);
        
        $categoriaServico = CategoriaServico::findOrFail($request -> $id);
        $categoriaServico -> nome = $request -> nome;

        $categoriaServico->save();
    
        return redirect('/categoriaServico')->with('status', 'Categoria alterada com sucesso!!');
    }

    
    
}
