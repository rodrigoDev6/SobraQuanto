@extends('adminlte::page')

@section('title', 'Sobra Quanto')

@section('content_header')
    <h1 class="text-center">Dados do produto:</h1>
@stop

@section('content')


    <ul class="list-unstyled">
        <li><b>ID:</b> {{ $produto->id }}</li>
        <li><b>Nome:</b> {{ $produto->nome }}</li>
   
        <li><b>Valor:</b> {{ $produto->valor }}</li>
  
    </ul>

    <a href="{{ url('produto') }}" class="btn btn-primary">Voltar</a>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="icon" href="img/sobraquanto.png">

@stop
