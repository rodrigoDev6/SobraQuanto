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
                                {{ Form::text('nome', '', ['class' => 'form-control', 'placeholder' => 'Nome Completo']) }}
                            </div>

                            <div class="form-group col">
                                {{ Form::label('cpf_cnpj', 'CPF ou CNPJ:') }}
                                {{ Form::text('cpf_cnpj', '', ['class' => 'form-control', 'placeholder' => 'Digite o CPF ou CNPJ']) }}
                            </div>
                        </div>

                        <div class="row col-12">
                            <div class="form-group col-6">
                                {{ Form::label('celular', 'Telefone celular:') }}
                                <div class="input-group">

                                    {{ Form::text('celular', '', ['class' => 'form-control', 'placeholder' => '(21) 99999-9999']) }}
                                </div>
                            </div>
                            <div class="form-group col-6">
                                {{ Form::label('cep', 'CEP:') }}
                                <div class="input-group">
                                    {{ Form::text('telefoneCelular', '', ['class' => 'form-control', 'placeholder' => '12.345-678']) }}
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
                                {{ Form::label('endereco', 'Endereço:') }}
                                {{ Form::text('endereco', '', ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group col">
                                {{ Form::label('numero', 'Número:') }}
                                {{ Form::number('numero', '', ['class' => 'form-control']) }}
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
