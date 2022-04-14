@extends('adminlte::page')

@section('title', 'Sobra Quanto')

@section('content_header')
    <h1>Categoria de Serviço</h1>
@stop

@section('content')
<a href="{{ URL::to('categoriaServico/create') }}">
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
    <tbody>
        @foreach ($categoriaServico as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->nome }}</td>
                <td>
                    {{--  --}}
                    <a href="{{ url('categoriaServico/' . $value->id) }}" class="btn btn-primary">
                        <i class="fas fa-eye"></i>
                        Visualizar
                    </a>
                    {{--  --}}
                    <a href="{{ url('categoriaServico/' . $value->id . '/edit') }}" class="btn btn-info mx-5">
                        <i class="fas fa-edit"></i>
                        Editar

                </td>
        @endforeach

    </tbody>
</table>        
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
