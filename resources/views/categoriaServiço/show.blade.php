@extends('adminlte::page')

@section('title', 'Sobra Quanto')

@section('content_header')
    <h1 class="text-center">Dados da Categoria de serviço:</h1>
@stop

@section('content')


    <ul class="list-unstyled">
        <li><b>ID:</b> {{ $CategoriaServico->id }}</li>
        <li><b>Nome:</b> {{ $CategoriaServico->nome }}</li>
    </ul>

    <a href="{{ url('CategoriaServico') }}" class="btn btn-primary">Voltar</a>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="icon" href="img/sobraquanto.png">

@stop
