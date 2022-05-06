<?php

namespace App\Http\Controllers;
use App\Models\CategoriaProduto;
use Illuminate\Http\Request;

class CategoriaProdutoController extends Controller
{
    public function index(){

        $categoriaProduto = CategoriaProduto::orderby('id', 'ASC')->get();
        return view('categoriaProduto.index',['categoriaProduto'=>$categoriaProduto]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function create()
    {
        return view('categoriaProduto.create');
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
            'nome' => 'required|min:3',

        ], $messages);
        
        $categoriaProduto = new CategoriaProduto;
        $categoriaProduto -> nome = $request -> nome;

        $categoriaProduto->save();
        
    
        return redirect('/categoriaProduto')->with('status', 'Categoria criada com sucesso!!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\CategoriaProduto $CategoriaProduto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $CategoriaProduto = CategoriaProduto::findOrFail($id);
        return view('CategoriaProduto.show',['CategoriaProduto' => $CategoriaProduto]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $CategoriaProduto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $CategoriaProduto = CategoriaProduto::findOrFail($id);
        return view('categoriaProduto.edit', ['CategoriaProduto' => $CategoriaProduto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\CategoriaProduto $CategoriaProduto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'nome.required' => 'O campo :attribute é obrigatório!',
            
            'nome.min' => 'O :attribute precisa ter no mínimo :min.',
            
        ];

        $validate = $request->validate([
            'nome' => 'required|min:3',

        ], $messages);
        
        $CategoriaProduto = new CategoriaProduto;
        $CategoriaProduto -> nome = $request -> nome;

        $CategoriaProduto->save();
    
        return redirect('/categoriaProduto')->with('status', 'Categoria alterada com sucesso!!');

    }

        /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\CategoriaProduto $CategoriaProduto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $CategoriaProduto = CategoriaProduto::findOrFail($id);
        $CategoriaProduto->delete();

        return redirect('/categoriaProduto')->with('status', 'Categoria excluida com sucesso!');

    }
   
    
}
