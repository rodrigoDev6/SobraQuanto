@extends('adminlte::page')

@section('title', 'Sobra Quanto')

<head>
    <style>
        .card-title {
            float: none !important;
        }

    </style>
</head>

@section('content_header')
    <h1>Painel de venda</h1>
@stop

@section('content')
    <p>PDV onde as vendas do caixa serão realizadas. Tela 10/43</p>


    {{-- container principal --}}
    <div class="row row-cols-1">

        {{-- container de produtos listados --}}
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 p-4 bg-light">
            @foreach ($produtos as $key => $produtoItem)
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            {{ Form::open(['class' => 'addProduto']) }}
                            {{ Form::hidden('produto_id', $produtoItem->id) }}
                            {{ Form::hidden('nome', $produtoItem->nome) }}
                            {{ Form::hidden('quantidade', 1) }}
                            <h5 class="card-title">{{ $produtoItem->nome }}</h5>
                            <p class="card-text">{{ $produtoItem->valor }}</p>

                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-cart-plus"></i>
                                Adicionar
                            </button>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        {{-- container de carrinho de compras --}}
        <div class="row row-cols-1 p-4 justify-content-start">
            <div class="card">
                <h5 class="card-header bg-black">Caixa de Vendas</h5>
                <div class="card-body text-center">
                    <h5 class="card-title text-center">Seu caixa está vazio</h5>

                    <hr>

                    <span>Total:</span>
                </div>
            </div>
        </div>
    </div>




@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
