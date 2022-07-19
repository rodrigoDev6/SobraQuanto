@extends('adminlte::page')

@section('title', 'Sobra Quanto')

@section('content_header')
    <h1>Dados do Usuário</h1>
@stop

@section('content')



    <ul class="list-unstyled">
        <li><b>ID:</b> {{ $usuario->id }}</li>
        <li><b>Nome:</b> {{ $usuario->name }}</li>
        <li><b>Perfil:</b> {{ $usuario->perfil }}</li>
        <br>
        <li><b>Criado em:</b> {{ $usuario->created_at }}</li>
        <li><b>Ultima atualização</b>: {{ $usuario->updated_at }}</li>
        <li><b>Status:</b></li>
    </ul>

    <a href="{{ url('usuario') }}" class="btn btn-primary">Voltar</a>


@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
    <link rel="icon" href="img/sobraquanto.png">
@stop
