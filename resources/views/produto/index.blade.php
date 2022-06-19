@extends('adminlte::page')

@section('title', 'Sobra Quanto')

@section('content_header')
    <h1>Produto</h1>
@stop

@section('content')
    <a href="{{ URL::to('produto/create') }}">
        <button class="btn btn-outline-success mb-3">
            <i class="fas fa-plus"></i>
            Adicionar produto
        </button>
    </a>

    <div class="row row-cols-12 m-2">

        <table class="table no-margin">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Valor</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->nome }}</td>
                        <td>{{ $value->categoria->nome }}</td>
                        <td>R$ {{ $value->valor }}</td>
                        <td>{{ $value->quantidade }}</td>
                        <td>
                            {{--  --}}
                            <a href="{{ url('produto/' . $value->id) }}" class="btn btn-primary">
                                <i class="fas fa-eye"></i>
                                Visualizar
                            </a>
                            {{--  --}}
                            <a href="{{ url('produto/' . $value->id . '/edit') }}" class="btn btn-info mx-5">
                                <i class="fas fa-edit"></i>
                                Editar
                            </a>

                            <a class="btn btn-danger" data-toggle="modal" data-target="#ModalDelete{{ $value->id }}"
                                href="">Excluir</a>


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
                                            <p class="text-center">
                                                Confirma a exclusão do registro?
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Fechar</button>
                                            {{ Form::open(['url' => 'produto/' . $value->id, 'onsubmit' => 'return ConfirmDelete()']) }}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Excluir Permanentetemente', ['class' => 'btn btn-danger']) }}
                                            {{ Form::close() }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Esse botão deveria ser para mudar status de inativo para ativo ou vice versa
                            <a href="{{ url('produto/' . $value->id) }}" class="btn btn-danger ">
                                <i class="fas fa-trash"></i>
                                Excluir
                            </a> --}}
                        </td>
                @endforeach

            </tbody>
        </table>

    </div>

    <div class="row justify-content-center">

        {{ $produtos->links() }}

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="./css/admin_custom.css">

@stop