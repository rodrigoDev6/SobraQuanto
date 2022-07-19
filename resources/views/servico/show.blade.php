@extends('adminlte::page')

@section('title', 'Sobra Quanto')

@section('content_header')
    <h1 class="text-center">Dados do serviço:</h1>
@stop

@section('content')


    <ul class="list-unstyled">
        <li><b>ID:</b> {{ $servico->id }}</li>
        <li><b>Nome:</b> {{ $servico->nome }}</li>
        <li><b>Valor:</b>R$ {{ $servico->valor }}</li>
    </ul>

    <a href="{{ url('servico') }}" class="btn btn-primary">Voltar</a>


@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/admin_custom.css') }}">
    <link rel="icon" href="img/sobraquanto.png">

@stop
