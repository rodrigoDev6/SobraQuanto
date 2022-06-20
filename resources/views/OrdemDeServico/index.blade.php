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
        <div class="form-group col-4">

            <a href="{{ URL::to('ordemDeServico/create') }}">
                <button class="btn btn-outline-success mb-3">
                    <i class="fas fa-plus"></i>
                    Nova Ordem de Serviço
                </button>
            </a>
        </div>
    </div>


    <div class="row row-cols-12 m-2">

        <table class="table table-bordered table-hover dataTable dtr-inline">
            <thead class="text-center text-uppercase">
                <tr>
                    <th>Nº Ordem</th>
                    <th>Cliente</th>
                    <th>Status</th>
                    <th>Pagamento</th>
                    <th>Total</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>

            <tbody class="text-center">
                @foreach ($ordemDeServico as $value)
                    <tr>
                        <td class="h5">
                            @if ($value->id > 99)
                                {{ $value->id }}
                            @elseif ($value->id < 10)
                                00{{ $value->id }}
                            @elseif($value->id > 9)
                                0{{ $value->id }}
                            @endif
                        </td>
                        <td class="h5 text-capitalize">{{ $value->cliente->nome }}</td>
                        <td class="h5 text-uppercase">
                            @if ($value->status_id == 1)
                                <span class="badge badge-warning">Orçamento</span>
                            @elseif ($value->status_id == 2)
                                <span class="badge badge-info">Em andamento</span>
                            @elseif ($value->status_id == 3)
                                <span class="badge badge-success">Feita</span>
                            @elseif ($value->status_id == 4)
                                <span class="badge badge-danger">Interrompida</span>
                            @endif
                        </td>
                        <td class="h5 text-uppercase">
                            {{ $value->forma_pagamento }}
                        </td>
                        <td>
                            R$ {{ $value->total }}
                        </td>
                        <td class="h5">
                            <a href="{{ URL::to('ordemDeServico/' . $value->id) }}">
                                <button class="btn btn-outline-primary">
                                    <i class="fas fa-solid fa-print"></i>
                                </button>
                            </a>
                            <a href="{{ URL::to('ordemDeServico/' . $value->id . '/edit') }}">
                                <button class="btn btn-outline-info">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </a>
                            {{-- <a href="{{ URL::to('ordemDeServico/' . $value->id . '/delete') }}">
                                <button class="btn btn-outline-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row justify-content-center">
        {{ $ordemDeServico->links() }}
    </div>

@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop
