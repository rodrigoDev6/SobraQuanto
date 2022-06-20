@extends('adminlte::page')

@section('title', 'Sobra Quanto')

@section('content_header')
    <h1 class="text-center">Dados do Cliente:</h1>
@stop

@section('content')


    <ul class="list-unstyled">
        <li><b>ID:</b> {{ $cliente->id }}</li>
        <li><b>Nome:</b> {{ $cliente->nome }}</li>
        <li class="list-inline-item">
            <span style="margin-right: 1.4rem"><b>Celular: </b> {{ $cliente->telefoneCelular }}</span>
            <span><b>Telefone:</b> {{ $cliente->telefoneFixo }}</span>
        </li>
        <li><b>Cidade:</b> {{ $cliente->cidade }}</li>
        <li><b>UF:</b> {{ $cliente->uf }} </li>
        <li><b>Bairro:</b> {{ $cliente->bairro }}</li>
        <li>
            <span><b>Endereço:</b> {{ $cliente->endereco }}</span>
            <span style="margin-left: 1.4rem"><b>Número:</b> {{ $cliente->numero }}</span>
        </li>
        <li><b>Complemento:</b> {{ $cliente->complemento }}</li>
        <br>
        <li><b>Criado em:</b> {{ $cliente->created_at }}</li>
        <li><b>Ultima atualização</b>: {{ $cliente->updated_at }}</li>
        <li><b>Status:</b></li>
    </ul>

    <a href="{{ url('cliente') }}" class="btn btn-primary">Voltar</a>


@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">

    <link rel="icon" href="img/sobraquanto.png">

@stop
