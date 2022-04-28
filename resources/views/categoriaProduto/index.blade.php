@extends('adminlte::page')

@section('title', 'Sobra Quanto')

@section('content_header')
    <h1>Categoria de Produto</h1>
@stop

@section('content')
<a href="{{ URL::to('categoriaProduto/create') }}">
    <button class="btn btn-outline-success mb-3">
        <i class="fas fa-plus"></i>
        Adicionar categoria de produto
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
    <tbody>
        @foreach ($categoriaProduto as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->nome }}</td>
                <td>
                    {{--  --}}
                    <a href="{{ url('categoriaProduto/' . $value->id) }}" class="btn btn-primary">
                        <i class="fas fa-eye"></i>
                        Visualizar
                    </a>
                    {{--  --}}
                    <a href="{{ url('categoriaProduto/' . $value->id . '/edit') }}" class="btn btn-info mx-5">
                        <i class="fas fa-edit"></i>
                        Editar

                        <a href="{{ url('categoriaProduto/' . $value->id . '/delete') }}" class="btn btn-danger">
                        <i class="fas fa-trash"></i>
                        Deletar
                    </a>

                </td>
        @endforeach

    </tbody>
</table>        
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
