<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servico;

class ServicoController extends Controller
{
    public function index(){
        $servico = Servico::orderby('id', 'ASC')->get();
        return view('servico.index',['servico'=>$servico]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('servico.create');
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
        
        $servico = new Servico;
        $servico->nome = $request -> nome;
        $servico->valor = $request -> valor;
        $servico->save();
    
        return redirect('/servico')->with('status', 'Serviço criada com sucesso!!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Servico $servico
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servico = Servico::findOrFail($id);
        return view('servico.show',['servico' => $servico]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $servico
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servico = Servico::findOrFail($id);
        return view('servico.edit', ['servico' => $servico]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\Servico $servico
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
        
        $servico = Servico::findOrFail($id);
        $servico -> nome = $request -> nome;
        $servico -> valor = $request -> valor;
        $servico->save();
    
        return redirect('/servico')->with('status', 'Serviço alterada com sucesso!!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Servico $servico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servico = Servico::findOrFail($id);
        $servico -> delete();

        return redirect('/servico')->with('status', 'Serviço excluido com sucesso!');
    }
}