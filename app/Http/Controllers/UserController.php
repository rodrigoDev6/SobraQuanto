<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $user = User::orderBy('id', 'ASC')->get();
        return view('usuario.index', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.create');
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
            'nome.required' => 'O campo Nome é obrigatório!',
            'email.required' => 'O campo E-mail é obrigatório!',
            'perfil.required' => 'O campo Perfil é obrigatório!',
            'senha.required' => 'O campo Senha é obrigatório!',
        ];

        $validate = $request->validate([
            'nome' => 'required|min:5',
            'email' => 'required|email',
            'perfil' => 'required',
            'senha' => 'required|min:5',
        ], $messages);

        $user = new User;

        $user -> nome = $request->nome;
        $user -> email = $request->email;
        $user -> perfil = $request->perfil;
        $user -> senha = $request->senha;
        $user -> save();

        return redirect('/usuario')->with('status', 'Usuário criado com sucesso!!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $usuario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::findOrFail($id);
        return view('usuario.show',['usuario' => $usuario]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        return view('usuario.edit', ['usuario' => $usuario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\User $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'name.required' => 'O campo nome é obrigatório!',
            'email.required' => 'O campo email é obrigatório!',
            'perfil.required' => 'O campo perfil obrigatório!',
            'password.required' => 'O campo senha é obrigatório!'
        ];

        $validate = $request->validate([
            'name' => 'required|min:5' ,
            'email' => 'required|min:9',
            'perfil' => 'required|min:4',
            'password' => 'required|min:6'

        ], $messages);
        
        $usuario = User::findOrFail($request->id);
        $usuario -> name = $request -> name;
        $usuario -> email = $request -> email;
        $usuario -> perfil = $request -> perfil;
        $usuario -> password = $request -> password;

        $usuario->save();
    
        return redirect('/usuario')->with('status', 'Usuário alterado com sucesso!!');
    }

    
}