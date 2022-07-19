@extends('adminlte::page')

@section('title', 'Sobra Quanto')

@section('content_header')
    <h1 class="text-center">Dados da Categoria de produto:</h1>
@stop

@section('content')


    <ul class="list-unstyled">
        <li><b>ID:</b> {{ $CategoriaProduto->id }}</li>
        <li><b>Nome:</b> {{ $CategoriaProduto->nome }}</li>
    </ul>

    <a href="{{ url('categoriaProduto') }}" class="btn btn-primary">Voltar</a>


@stop

@section('css')
    <link rel="icon" href="img/sobraquanto.png">
    <link rel="stylesheet" href="{{ asset('/css/admin_custom.css') }}">
@stop
