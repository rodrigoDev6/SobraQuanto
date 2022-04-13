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
        $clientes = Cliente::orderby('id', 'ASC')->get();
        return view('cliente.index',['clientes'=>$clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
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
            'cpf_cnpj.required' => 'O campo CPF ou CNPJ é obrigatório!',
            'telefoneCelular.required' => 'O campo Telefone é obrigatório!',
            'cidade.required' => 'O campo Cidade obrigatório!',
            'uf.required' => 'O campo UF é obrigatório!',
            'bairro.required' => 'O campo Bairro é obrigatório!',
            // 'complemento.required' => 'O campo Complemento é obrigatório!',
            
            'nome.min' => 'O :attribute precisa ter no mínimo :min.',
            'cpf_cnpj.min' => 'O CPF precisa ter 11 números e caso seja CNPJ 14.',
            'telefoneCelular.min' => 'O :attribute precisa ter no mínimo :min.',
        ];

        $validate = $request->validate([
            'nome' => 'required|min:5',
            'cpf_cnpj' => 'required|min:11' ,
            'telefoneCelular' => 'required|min:9',
            'cidade' => 'required|min:4',
            'uf' =>  'required|min:2',
            'bairro' => 'required|min:4',
            // 'complemento' => 'required|min:3'
        ], $messages);
        
        $cliente = new Cliente;
        $cliente -> nome = $request -> nome;
        $cliente -> cpf_cnpj = $request -> cpf_cnpj;
        $cliente -> telefoneCelular = $request -> telefoneCelular;
        $cliente -> cidade = $request -> cidade;
        $cliente -> uf = $request -> uf;
        $cliente -> bairro = $request -> bairro;
        $cliente -> complemento = $request -> complemento;
        $cliente->save();
        
    
        return redirect('/cliente')->with('status', 'Cliente criado com sucesso!!');
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
            'nome.required' => 'O campo :attribute é obrigatório',
            'cpf_cnpj.required' => 'O campo CPF ou CNPJ é obrigatório!',
            'telefoneCelular.required' => 'O campo Telefone é obrigatório!',
            'cidade.required' => 'O campo Cidade obrigatório!',
            'uf.required' => 'O campo UF é obrigatório!',
            'bairro.required' => 'O campo Bairro é obrigatório!',
            // 'complemento.required' => 'O campo Complemento é obrigatório!',
            
            'nome.min' => 'O :attribute precisa ter no mínimo :min.',
            'cpf_cnpj.min' => 'O CPF precisa ter 11 números e caso seja CNPJ 14.',
            'telefoneCelular.min' => 'O :attribute precisa ter no mínimo :min.',
        ];

        $validate = $request->validate([
            'nome' => 'required|min:5',
            'cpf_cnpj' => 'required|min:11' ,
            'telefoneCelular' => 'required|min:9',
            'cidade' => 'required|min:4',
            'uf' =>  'required|min:2',
            'bairro' => 'required|min:4',
        ], $messages);
        
        $cliente = Cliente::findOrFail($request->id);
        $cliente->nome = $request -> nome;
        $cliente -> cpf_cnpj = $request -> cpf_cnpj;
        $cliente -> telefoneCelular = $request -> telefoneCelular;
        $cliente -> cidade = $request -> cidade;
        $cliente -> uf = $request -> uf;
        $cliente -> bairro = $request -> bairro;
        $cliente -> complemento = $request -> complemento;
        $cliente->save();
    
        return redirect('/cliente')->with('status', 'Categoria alterada com sucess!!');
    }

    
}