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
                    <h3>150</h3>
                    <p>Ordens de serviços</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-6 col-12">

            <div class="small-box bg-success">
                <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>
                    <p>Bounce Rate</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-6 col-12">

            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>44</h3>
                    <p>Total de clientes registrados</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-6 col-12">

            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>65</h3>
                    <p>Vendas na semana</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="card col-6">
            <div class="card-header border-0">
                <h3 class="card-title">Produtos mais vendidos</h3>
                <div class="card-tools">
                    <a href="#" class="btn btn-tool btn-sm">
                        <i class="fas fa-download"></i>
                    </a>
                    <a href="#" class="btn btn-tool btn-sm">
                        <i class="fas fa-bars"></i>
                    </a>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Preço</th>
                            <th>Vendas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                Mouse gamer
                            </td>
                            <td>R$ 18</td>
                            <td>
                                <span class="text-success mr-1">
                                    <i class="fas fa-arrow-up"></i>
                                    28
                                </span>

                            </td>

                        </tr>

                    </tbody>
                </table>
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
