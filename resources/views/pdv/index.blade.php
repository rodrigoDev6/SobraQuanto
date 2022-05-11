@extends('adminlte::page')

@section('title', 'Sobra Quanto')

@section('content_header')
    <h1>Painel de venda</h1>
@stop

@section('content')
    <p>PDV onde as vendas do caixa serão realizadas. Tela 10/43</p>

    <div class="container">
        <div class="col-6">
            <p>
                lado esquerdo com itens
            </p>
        </div>

        <div class="col-6">
            <p>
                lado direito com os itens selecionados
            </p>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
