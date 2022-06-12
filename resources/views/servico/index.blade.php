@extends('adminlte::page')

@section('title', 'Sobra Quanto')

@section('content_header')
    <h1>Serviço</h1>
@stop

@section('content')
    <a href="{{ URL::to('servico/create') }}">
        <button class="btn btn-outline-success mb-3">
            <i class="fas fa-plus"></i>
            Adicionar serviço
        </button>
    </a>

    <table class="table no-margin">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($servico as $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->nome }}</td>
                    <td>R$ {{ $value->valor }}</td>
                    <td>
                        {{--  --}}
                        <a href="{{ url('servico/' . $value->id) }}" class="btn btn-primary">
                            <i class="fas fa-eye"></i>
                            Visualizar
                        </a>
                        {{--  --}}
                        <a href="{{ url('servico/' . $value->id . '/edit') }}" class="btn btn-info mx-5">
                            <i class="fas fa-edit"></i>
                            Editar
                        </a>

                        <a class="btn btn-danger" data-toggle="modal" data-target="#ModalDelete{{ $value->id }}"
                            href="">Excluir</a>


                        <!-- Modal -->
                        <div class="modal fade" id="ModalDelete{{ $value->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirmar</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-center">Confirma a exclusão do registro?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        {{ Form::open(['url' => 'servico/' . $value->id, 'onsubmit' => 'return ConfirmDelete()']) }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        {{ Form::submit('Excluir Permanentetemente', ['class' => 'btn btn-danger']) }}
                                        {{ Form::close() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
            @endforeach

        </tbody>
    </table>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
