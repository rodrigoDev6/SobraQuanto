@extends('adminlte::page')

@section('title', 'Sobra Quanto')

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')
    <a href="{{ URL::to('cliente/create') }}">
        <button class="btn btn-outline-success mb-3">
            <i class="fas fa-plus"></i>
            Adicionar cliente
        </button>
    </a>

    <table class="table no-margin">
        <thead>
            <tr>
                <th>id</th>
                <th>nome</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th><b>AÇÕES</b></th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($clientes as $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->nome }}</td>
                    <td>{{ $value->cpf_cnpj }}</td>
                    <td>{{ $value->telefoneCelular }}</td>
                    <td>
                        {{--  --}}
                        <a href="{{ url('cliente/' . $value->id) }}" class="btn btn-primary">
                            <i class="fas fa-eye"></i>
                            Visualizar
                        </a>
                        {{--  --}}
                        <a href="{{ url('cliente/' . $value->id . '/edit') }}" class="btn btn-info mx-5">
                            <i class="fas fa-edit"></i>
                            Editar

                            {{-- Esse botão deveria ser para mudar status de inativo para ativo ou vice versa
                            <a href="{{ url('cliente/' . $value->id) }}" class="btn btn-danger ">
                                <i class="fas fa-trash"></i>
                                Excluir
                            </a> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="icon" href="img/sobraquanto.png">

@stop
