@extends('adminlte::page')

@section('title', 'Sobra Quanto')

@section('content_header')
@stop

@section('content')


    <div class="row col-12 pt-4">
        <div class="form-group col-4">
            {{ Form::label('status', 'Status da ordem:') }}
            {{ Form::select(
                'status',
                [
                    '0' => 'Todas',
                    '1' => 'Orçamento',
                    '2' => 'Em andamento',
                    '3' => 'Finalizada',
                    '4' => 'Cancelada',
                ],
                null,
                ['class' => 'form-control'],
            ) }}
        </div>
        <div class="form-group col-4">
            {{ Form::label('ordem', 'Ordenar por:') }}
            {{ Form::select(
                'ordem',
                [
                    'ASC' => 'ASC',
                    'DESC' => 'DESC',
                ],
                null,
                ['class' => 'form-control'],
            ) }}
        </div>
        <div class="form-group col-4">
            {{ Form::label('cleintes', 'Clientes:') }}
            {{ Form::select(
                'clientes',
                [
                    'Todos' => 'Todos',
                    '1' => 'RODRIGO',
                    '2' => 'JOSE',
                    '3' => 'MARIA',
                    '4' => 'JOAO',
                    '5' => 'PAULO',
                    '6' => 'JOSE',
                    '7' => 'MARIA',
                ],
                null,
                ['class' => 'form-control'],
            ) }}
        </div>

        <div class="form-group col-4">
            {{ Form::label('pesquisa', 'Pesquisa:') }}
            {{ Form::text('pesquisa', null, ['class' => 'form-control', 'placeholder' => 'Digite palavras chaves']) }}
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
                    <th>Serviços</th>
                    <th>Status</th>
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
