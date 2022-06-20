@extends('adminlte::page')

@section('title', 'Sobra Quanto')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                {{-- procurando categoria de servico --}}
                {{ Form::model($servico, ['route' => ['servico.update', $servico->id], 'method' => 'PUT']) }}
                <div class="card card-primary mt-5">
                    <div class="card-header h3">{{ __('Serviço Selecionado:') }}</div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

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
                            {{ Form::text('nome', $servico->nome, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group col">
                            {{ Form::label('valor', 'Valor:') }}
                            {{ Form::number('valor', $servico->valor, ['class' => 'form-control col-4']) }}
                        </div>
                        <div class="row col-12">
                            <div class="form-group col">
                                {{ Form::submit('Enviar', ['class' => 'btn btn-primary']) }}

                                <a class="btn btn-default float" href="{{ route('servico') }}">Cancelar</a>
                            </div>
                        </div>
                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')


    <link rel="stylesheet" href="{{ asset('/css/admin_custom.css') }}">
    <link rel="icon" href="img/sobraquanto.png">

@stop
