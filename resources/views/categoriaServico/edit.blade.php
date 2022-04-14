@extends('adminlte::page')

@section('title', 'Sobra Quanto')

@section('content_header')
    <h1 class="text-center">Categoria Selecionada:</h1>
@stop

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- procurando categoria de serviço --}}
    {{ Form::model($categoriaServico, ['route' => ['categoriaServico.update', $categoriaServico->id], 'method' => 'PUT']) }}



    {{ Form::label('nome', 'nome') }}
    {{ Form::text('nome', $categoriaServico->nome) }}
    <br>
    {{ Form::submit('Enviar') }}


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="icon" href="img/sobraquanto.png">

@stop
