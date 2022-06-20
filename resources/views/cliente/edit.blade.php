@extends('adminlte::page')
@section('content_header')
    @if (\Session::has('message'))
        <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
            {!! \Session::get('message') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
@stop
@section('title', 'Sobra Quanto')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card card-primary mt-2">
                    <div class="card-header h2">{{ __('Cliente Selecionado') }}</div>

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
                            <div class="form-group col-6">
                                {{ Form::label('telefone_1', 'Telefone 1:') }}
                                <div class="input-group">

                                    {{ Form::text('telefone_1', $cliente->telefone_1, ['class' => 'form-control', 'placeholder' => '(21) 99999-9999']) }}
                                </div>
                            </div>

                            <div class="form-group col-6">
                                {{ Form::label('telefone_2', 'Telefone 2:') }}
                                <div class="input-group">
                                    {{ Form::text('telefone_2', $cliente->telefone_2, ['class' => 'form-control', 'placeholder' => '(21) 99999-9999']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row col-12">
                            <div class="form-group col-6">
                                {{ Form::label('estado', 'Estado:') }}
                                {{ Form::select('estado_id', $estado, $cliente->estado_id, ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group col-3">
                                {{ Form::label('bairro', 'Bairro:') }}
                                {{ Form::text('bairro', $cliente->bairro, ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group col-3">
                                {{ Form::label('cep', 'CEP:') }}
                                {{ Form::text('cep', $cliente->cep, ['class' => 'form-control']) }}
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
    <link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">

    <link rel="icon" href="img/sobraquanto.png">

@stop
