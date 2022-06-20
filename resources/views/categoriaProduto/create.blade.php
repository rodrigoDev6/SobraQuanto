@extends('adminlte::page')

@section('title', 'Sobra Quanto')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-primary mt-5">
                    <div class="card-header h3">{{ __('Criar Categoria de Produto:') }}</div>


                    {!! Form::open(['url' => '/categoriaProduto/create']) !!}
                    <div class="card-body col-12">
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
                                {{ Form::text('nome', '', ['class' => 'form-control']) }}
                            </div>

                            <div class="row col-12">
                                <div class="form-group col">
                                    {{ Form::submit('Enviar', ['class' => 'btn btn-primary']) }}
                                    <a class="btn btn-default float-right"
                                        href="{{ route('categoriaProduto') }}">Cancelar</a>
                                </div>
                            </div>



                        </div>
                    </div>
                    {{-- card card-primary --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/admin_custom.css') }}">
@stop
