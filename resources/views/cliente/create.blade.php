@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">{{ __('Dashboard') }}</div>


                    {!! Form::open(['url' => '/cliente/create']) !!}
                    <div class="card-body">
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




                        <div class="form-group">
                            {{ Form::label('nome', 'Nome:') }}
                            {{ Form::text('nome'), ['class' => 'form-control'] }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('cpf_cnpj', 'CPF ou CNPJ:') }}
                            {{ Form::text('cpf_cnpj'), ['class' => 'form-control'] }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('telefone', 'Telefone:') }}
                            {{ Form::text('telefoneCelular'), ['class' => 'form-control'] }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('cidade', 'Cidade:') }}
                            {{ Form::text('cidade'), ['class' => 'form-control'] }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('uf', 'UF:') }}
                            {{ Form::text('uf'), ['class' => 'form-control'] }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('bairro', 'Bairro:') }}
                            {{ Form::text('bairro') }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('complemento', 'Complemento') }}
                            {{ Form::text('complemento'), ['class' => 'form-control'] }}
                        </div>
                        {{ Form::submit('Enviar') }}

                        {!! Form::close() !!}


                    </div>
                </div>
                {{-- card card-primary --}}
            </div>
        </div>
    </div>
@endsection
