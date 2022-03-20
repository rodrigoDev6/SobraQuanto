@extends('adminlte::page')

@section('title', 'Sobra Quanto')

@section('content_header')
    <h1 class="text-center">Dados do Cliente:</h1>
@stop

@section('content')


    <ul class="list-unstyled">
        <li><b>ID:</b> {{ $clientes->id }}</li>
        <li><b>Nome:</b> {{ $clientes->nome }}</li>
        <li class="list-inline-item">
            <span style="margin-right: 1.4rem"><b>Celular: </b> {{ $clientes->telefoneCelular }}</span>
            <span><b>Telefone:</b> {{ $clientes->telefoneFixo }}</span>
        </li>
        <li><b>Cidade:</b> {{ $clientes->cidade }}</li>
        <li><b>UF:</b> {{ $clientes->uf }} </li>
        <li><b>Bairro:</b> {{ $clientes->bairro }}</li>
        <li>
            <span><b>Endereço:</b> {{ $clientes->endereco }}</span>
            <span style="margin-left: 1.4rem"><b>Número:</b> {{ $clientes->numero }}</span>
        </li>
        <li><b>Complemento:</b> {{ $clientes->complemento }}</li>
        <br>
        <li><b>Criado em:</b> {{ $clientes->created_at }}</li>
        <li><b>Ultima atualização</b>: {{ $clientes->updated_at }}</li>
        <li><b>Status:</b></li>
    </ul>

    <a href="{{ url('clientes') }}" class="btn btn-primary">Voltar</a>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="icon" href="img/sobraquanto.png">

@stop
