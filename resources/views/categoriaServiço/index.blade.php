@extends('adminlte::page')

@section('title', 'Sobra Quanto')

@section('content_header')
    <h1>Categoria de Serviço</h1>
@stop

@section('content')
    <button class="btn btn-outline-success mb-3">
        <i class="fas fa-plus"></i>
        Adicionar categoria de serviço
    </button>
    <table class="table no-margin">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th><b>AÇÕES</b></th>
                <th></th>
            </tr>
        </thead>
  

    </table>        
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
