@extends('adminlte::page')

@section('title', 'Sobra Quanto')

@section('content_header')
@stop

@section('content')


    <div class="row col-12">
        <div class="form-group col-4">
            {{ Form::label('status', 'Status:') }}
            {{ Form::select(
                'status',
                [
                    'A' => 'Aberto',
                    'F' => 'Fechado',
                ],
                null,
                ['class' => 'form-control'],
            ) }}
        </div>
        <div class="form-group col-4">
            {{ Form::label('status', 'Status:') }}
            {{ Form::select(
                'status',
                [
                    'A' => 'Aberto',
                    'F' => 'Fechado',
                ],
                null,
                ['class' => 'form-control'],
            ) }}
        </div>
        <div class="form-group col-4">
            {{ Form::label('status', 'Status:') }}
            {{ Form::select(
                'status',
                [
                    'A' => 'Aberto',
                    'F' => 'Fechado',
                ],
                null,
                ['class' => 'form-control'],
            ) }}
        </div>

        <div class="form-group col-4">
            {{ Form::label('pesquisa', 'Pesquisa:') }}
            {{ Form::text('pesquisa', null, ['class' => 'form-control', 'placeholder' => 'Pesquisa']) }}
        </div>

        <div class="form-group col-4">
            {{ Form::label('data_inicial', 'Data Inicial:') }}
            {{ Form::date('data_inicial', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group col-4">
            {{ Form::label('data_final', 'Data Final:') }}
            {{ Form::date('data_final', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="row justify-content-end mr-4">

        <a href="{{ URL::to('ordemDeServico/create') }}">
            <button class="btn btn-outline-success mb-3">
                <i class="fas fa-plus"></i>
                Nova Ordem de Serviço
            </button>
        </a>
    </div>


    <div class="row row-cols-12 m-2">

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

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        {{--  --}}
                        <a href="#" class="btn btn-primary">
                            <i class="fas fa-eye"></i>
                            Visualizar
                        </a>
                        {{--  --}}
                        <a href="#" class="btn btn-info mx-5">
                            <i class="fas fa-edit"></i>
                            Editar
                        </a>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

    <div class="row justify-content-center">

        {{-- {{ $cliente->links() }} --}}
    </div>




@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
