@extends('adminlte::page')

@section('title', 'Sobra Quanto')

@section('content_header')
    <h1>Categoria de Serviço</h1>
@stop

@section('content')
<a href="{{ URL::to('CategoriaServico/create') }}">
    <button class="btn btn-outline-success mb-3">
        <i class="fas fa-plus"></i>
        Adicionar categoria de serviço
    </button>
</a>

    <table class="table no-margin">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th></th>
            </tr>
        </thead>
  

    </table>        
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
