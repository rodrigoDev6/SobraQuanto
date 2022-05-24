@extends('adminlte::page')

@section('title', 'Sobra Quanto')

@section('content_header')
    <h1>Usuários</h1>
@stop

@section('content')

    <a href="{{ URL::to('usuarios/create') }}">
        <button class="btn btn-outline-success mb-3">
            <i class="fas fa-plus"></i>
            Adicionar usuário
        </button>
    </a>

    <table class="table no-margin">
        <thead>
            <tr>
                <th>ID</th>
                <th>E-mail</th>
                <th>Nome</th>
                <th>Perfil</th>
                <th><b>Ações</b></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($user as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->nome }}</td>
                    <td>{{ $usuario->perfil }}</td>
                    <td>

                        {{-- btn-visualizar --}}
                        <a href="{{ url('usuarios/' . $usuario->id) }}" class="btn btn-primary">
                            <i class="fas fa-eye"></i>
                            Visualizar
                        </a>
                        {{-- Btn editar --}}
                        <a href="{{ url('usuarios/' . $usuario->id . '/edit') }}" class="btn btn-info mx-5">
                            <i class="fas fa-edit"></i>
                            Editar
                        </a>

                        {{-- Btn excluir --}}
                        <a class="btn btn-danger" data-toggle="modal" data-target="#ModalDelete" href="">
                            <i class="fas fa-trash">
                            </i>
                            Excluir</a>
                    </td>

                </tr>
            @endforeach
        </tbody>

    </table>
    @foreach ($user as $value)
        <!-- Modal -->
        <div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        <p class="text-center">Confirma a exclusão do usuário?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        {{ Form::open(['url' => 'usuarios/' . $value->id, 'onsubmit' => 'return ConfirmDelete()']) }}
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
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
