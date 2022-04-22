@extends('adminlte::page')

@section('title', 'Sobra Quanto')

@section('content_header')
    <h1 class="text-center">Categoria Selecionada:</h1>
@stop

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb-3">Categoria selecionada:</h1>

                <div class="card card-primary ">
                    <div class="card-header">{{ __('Dashboard') }}</div>

<div class="card-body col-12">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
            </ul>
        </div>
    @endif
    
    {{-- procurando categoria de produto --}}
    {{ Form::model($CategoriaProduto, ['route' => ['categoriaProduto.update', $CategoriaProduto->id], 'method' => 'PUT']) }}


    <div class="row col-12">
    <div class="form-group col">
    {{ Form::label('nome', 'nome') }}
    {{ Form::text('nome', $CategoriaProduto->nome) }}
    </div>
    {{ Form::submit('Enviar') }}
    </div>
    </div>
    </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="icon" href="img/sobraquanto.png">

@stop
