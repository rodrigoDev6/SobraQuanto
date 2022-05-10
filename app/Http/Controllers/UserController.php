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
        return view('usuarios.index', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
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

        return redirect('/usuarios')->with('status', 'Usuário criado com sucesso!!');
    }
}
