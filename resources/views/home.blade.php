@extends('adminlte::page')

@section('title', 'Sobra Quanto')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-6 col-12">

            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ count($ordemDeServicos) }}</h3>
                    <p>Ordens de serviços</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('ordemDeServico') }}" class="small-box-footer">Ver mais <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-6 col-12">

            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ count($produtos) }}</h3>
                    <p>Total de produtos</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('produto') }}" class="small-box-footer">Ver mais <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-6 col-12">

            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ count($clientes) }}</h3>
                    <p>Total de clientes registrados</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ route('usuario') }}" class="small-box-footer">Ver mais <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-6 col-12">

            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ count($vendas) }}</h3>
                    <p>Vendas na semana</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{ route('pdv.index') }}" class="small-box-footer">Ver mais  <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
