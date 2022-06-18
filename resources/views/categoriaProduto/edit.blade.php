@extends('adminlte::page')

@section('title', 'Sobra Quanto')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb-3"> </h1>


                {{-- procurando categoria de produto --}}
                {{ Form::model($CategoriaProduto, ['route' => ['categoriaProduto.update', $CategoriaProduto->id], 'method' => 'PUT']) }}
                <div class="card card-primary ">
                    <div class="card-header h3 mt">{{ __('Categoria Selecionada:') }}</div>

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
                            {{ Form::text('nome', $CategoriaProduto->nome, ['class' => 'form-control']) }}
                        </div>

                        <div class="row col-12">
                            <div class="form-group col">

                                {{ Form::submit('Enviar', ['class' => 'btn btn-primary']) }}

                                <a class="btn btn-default float" href="{{ route('categoriaProduto') }}">Cancelar</a>
                            </div>
                        </div>

                    </div>
                </div>

            @endsection
            @section('css')
                <link rel="stylesheet" href="/css/admin_custom.css">
                <link rel="icon" href="img/sobraquanto.png">

            @stop
