@extends('adminlte::page')

@section('title', 'Sobra Quanto')

@section('content_header')
    <h1>Categoria de Produto</h1>
@stop

@section('content')
    <div class="row row-cols-12 m-2">
        <a href="{{ URL::to('categoriaProduto/create') }}">
            <button class="btn btn-outline-success mb-3">
                <i class="fas fa-plus"></i>
                Adicionar categoria de produto
            </button>
        </a>


        <table class="table no-margin">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categoriaProduto as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->nome }}</td>
                        <td>
                            {{--  --}}
                            <a href="{{ url('categoriaProduto/' . $value->id) }}" class="btn btn-primary">
                                <i class="fas fa-eye"></i>
                                Visualizar
                            </a>
                            {{--  --}}
                            <a href="{{ url('categoriaProduto/' . $value->id . '/edit') }}" class="btn btn-info mx-5">
                                <i class="fas fa-edit"></i>
                                Editar
                            </a>
                            <a class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"
                                href="">Excluir</a>


                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <div class="row justify-content-center">
        {{ $categoriaProduto->links() }}
    </div>


    @foreach ($categoriaProduto as $value)
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirmar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">Confirma a exclusão do registro?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        {{ Form::open(['url' => 'categoriaProduto/' . $value->id, 'onsubmit' => 'return ConfirmDelete()']) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Excluir Permanentetemente', ['class' => 'btn btn-danger']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach


@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/admin_custom.css') }}">
@stop
