@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb-3">Novo cliente:</h1>

                <div class="card card-primary ">
                    <div class="card-header">{{ __('Dashboard') }}</div>


                    {!! Form::open(['url' => '/cliente/create']) !!}
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
                                {{ Form::label('cpf_cnpj', 'CPF ou CNPJ:') }}
                                {{ Form::text('cpf_cnpj', '', ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="row col-12">
                            <div class="form-group col">
                                {{ Form::label('telefoneCelular', 'Telefone celular:') }}
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>

                                    {{ Form::text('telefoneCelular', '', ['class' => 'form-control']) }}
                                </div>
                            </div>

                            <div class="form-group col">
                                {{ Form::label('telefoneFixo', 'Telefone fixo:') }}
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>

                                    {{ Form::text('telefoneFixo', '', ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row col-12">
                            <div class="form-group col-4">
                                {{ Form::label('cidade', 'Cidade:') }}
                                {{ Form::text('cidade', '', ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group col-2">
                                {{ Form::label('uf', 'UF:') }}
                                {{ Form::text('uf', '', ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group col">
                                {{ Form::label('bairro', 'Bairro:') }}
                                {{ Form::text('bairro', '', ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="row col-12">
                            <div class="form-group col">
                                {{ Form::label('complemento', 'Complemento:') }}
                                {{ Form::text('complemento', '', ['class' => 'form-control']) }}
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
                {{-- card card-primary --}}
            </div>
        </div>
    </div>
@endsection
