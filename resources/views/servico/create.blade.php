@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb-3"> </h1>

                <div class="card card-primary ">
                    <div class="card-header h3 mt">{{ __('Criar novo de serviço:') }}</div>


                    {!! Form::open(['url' => '/servico/create']) !!}
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
                            <div class="form-group col">
                                {{ Form::label('valor', 'Valor:') }}
                                {{ Form::number('valor', null, ['class' => 'form-control col-4']) }}
                            </div>

                            <div class="row col-12">
                                <div class="form-group col">
                                    {{ Form::submit('Enviar', ['class' => 'btn btn-primary']) }}

                                    <a class="btn btn-default float-right" href="{{ route('servico') }}">Cancelar</a>
                                </div>
                            </div>



                        </div>
                    </div>
                    {{-- card card-primary --}}
                </div>
            </div>
        </div>
    @endsection
