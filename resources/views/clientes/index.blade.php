@extends('adminlte::page')

@section('title', 'Sobra Quanto')

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')

    <table class="table no-margin">
        <thead>
            <tr>
                <th>id</th>
                <th>nome</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th></th>
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
                    <td><a href="{{ url('cliente/' . $value->id) }}" class="btn btn-block btn-primary">Visualizar</a>
                    </td>
            @endforeach

        </tbody>

    </table>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="icon" href="img/sobraquanto.png">

@stop
