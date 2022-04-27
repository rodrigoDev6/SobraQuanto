@extends('adminlte::page')

@section('title', 'Sobra Quanto')

@section('content_header')
    <h1>Painel de Vendas</h1>
@stop

@section('content')
    <p>PDV onde as vendas do caixa serão realizadas. Tela 10/43</p>

    {{-- teste --}}
    <div class="container-fluid">



        <div class="row">
            <aside class="col-lg-9">
                <div class="card-body">
                    Aqui ficarão os produtos vendidos
                </div>
            </aside>
            <aside class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h4>Carrinho vazio</h4>
                        <p>Total: R$ 0,00</p>
                        <p>Desconto: R$ 0,00</p>
                        <hr>
                        <div class="btn-group-vertical center">
                            <a href="#" class="btn btn-success" type="button">Finalizar Pedido</a>
                            <br>
                            <a href="#" class="btn btn-danger" type="button">Cancelar</a>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
    {{-- fim teste --}}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/resources/css/pdv.css">
    <link rel="icon" href="img/sobraquanto.png">

@stop
