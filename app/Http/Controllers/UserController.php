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
            'password.required' => 'O campo Senha é obrigatório!',
        ];

        $validate = $request->validate([
            'nome' => 'required|min:5',
            'email' => 'required|email',
            'perfil' => 'required',
            'password' => 'required|min:5',
        ], $messages);

        $user = new User;

        $user -> nome = $request->nome;
        $user -> email = $request->email;
        $user -> perfil = $request->perfil;
        $user -> password = $request->password;
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
            'nome.required' => 'O campo nome é obrigatório!',
            'email.required' => 'O campo email é obrigatório!',
            'perfil.required' => 'O campo perfil obrigatório!',
            'senha.required' => 'O campo senha é obrigatório!'
        ];

        $validate = $request->validate([
            'nome' => 'required|min:11' ,
            'email' => 'required|min:9',
            'perfil' => 'required|min:4',
            'senha' => 'required|min:6'
        ], $messages);
        
        $usuario = User::findOrFail($request->id);
        $usuario -> nome = $request -> nome;
        $usuario -> email = $request -> email;
        $usuario -> perfil = $request -> perfil;
        $usuario -> senha = $request -> senha;

        $usuario->save();
    
        return redirect('/usuario')->with('status', 'Usuário alterado com sucesso!!');
    }

    
}