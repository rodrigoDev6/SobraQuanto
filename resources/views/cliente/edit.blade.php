@extends('adminlte::page')

@section('title', 'Sobra Quanto')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb-3">Cliente selecionado:</h1>

                <div class="card card-primary ">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    {{-- procurando cliente --}}
                    {{ Form::model($cliente, ['route' => ['cliente.update', $cliente->id], 'method' => 'PUT']) }}
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
                            <div class="form-group col">
                                {{ Form::label('nome', 'Nome:') }}
                                {{ Form::text('nome', $cliente->nome, ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group col">
                                {{ Form::label('cpf_cnpj', 'CPF ou CNPJ:') }}
                                {{ Form::text('cpf_cnpj', $cliente->cpf_cnpj, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="row col-12">
                            <div class="form-group col">
                                {{ Form::label('telefoneCelular', 'Telefone celular:') }}
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>

                                    {{ Form::text('telefoneCelular', $cliente->telefoneCelular, ['class' => 'form-control']) }}
                                </div>
                            </div>

                            <div class="form-group col">
                                {{ Form::label('telefoneFixo', 'Telefone fixo:') }}
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>

                                    {{ Form::text('telefoneFixo', $cliente->telefoneFixo, ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row col-12">
                            <div class="form-group col-4">
                                {{ Form::label('cidade', 'Cidade:') }}
                                {{ Form::text('cidade', $cliente->cidade, ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group col-2">
                                {{ Form::label('uf', 'UF:') }}
                                {{ Form::text('uf', $cliente->uf, ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group col">
                                {{ Form::label('bairro', 'Bairro:') }}
                                {{ Form::text('bairro', $cliente->bairro, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="row col-12">
                            <div class="form-group col">
                                {{ Form::label('complemento', 'Complemento:') }}
                                {{ Form::text('complemento', $cliente->complemento, ['class' => 'form-control']) }}
                            </div>
                        </div>



                        <div class="row col-12">
                            <div class="form-group col">
                                {{ Form::submit('Enviar', ['class' => 'btn btn-primary']) }}

                                <a class="btn btn-default float-right" href="{{ route('cliente') }}">Cancelar</a>
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
