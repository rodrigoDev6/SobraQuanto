@extends('adminlte::page')

@section('title', 'Sobra Quanto')

@section('content_header')
    <h1>Categoria de Produto</h1>
@stop

@section('content')
<a href="#">
        <button class="btn btn-outline-success mb-3">
            <i class="fas fa-plus"></i>
            Adicionar categoria de produto
        </button>
    </a>

    <table class="table no-margin">
        <thead>
            <tr>
            <th>id</th>
                <th>Nome</th>
                <th><b>Ações</b></th>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
