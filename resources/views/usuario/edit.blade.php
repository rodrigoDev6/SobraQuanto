@extends('adminlte::page')

@section('title', 'Sobra Quanto')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb-3">Usuario selecionado:</h1>

                <div class="card card-primary ">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    {{-- procurando usuario --}}
                    {{ Form::model($usuario, ['route' => ['usuario.update', $usuario->id], 'method' => 'PUT']) }}
                    <div class="card-body col-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif



                        <div class="row col-12">
                            <div class="form-group col-6">
                                {{ Form::label('nome', 'Nome:') }}
                                {{ Form::text('nome', $usuario->nome, ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group col-6">
                                {{ Form::label('email', 'Email:') }}
                                {{ Form::text('email', $usuario->email, ['class' => 'form-control']) }}
                            </div>
                            
                            <div class="form-group col-6">
                                {{ Form::label('perfil', 'Selecione o perfil de usuário:') }}
                                {{ Form::select('perfil', ['admin' => 'Administrador', 'padrao' => 'Padrão  '], null, [
                                    'class' => 'form-control',
                                ]) }}
                            </div>
                            
                            <div class="form-group col-6">
                                {{ Form::label('password', 'Senha:') }}
                                {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Senha']) }}
                            </div>
                        </div>
                   <div class="row col-12">
                            <div class="form-group col">
                                {{ Form::submit('Enviar', ['class' => 'btn btn-primary']) }}

                                <a class="btn btn-default float-right" href="{{ route('usuario') }}">Cancelar</a>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
            {{-- card card-primary --}}
        </div>
    </div>




@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="icon" href="img/sobraquanto.png">

@stop
