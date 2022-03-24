@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">{{ __('Dashboard') }}</div>


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



                        {!! Form::open(['url' => '/cliente/create']) !!}


                        {{ Form::label('nome', 'Nome:') }}
                        {{ Form::text('nome') }}


                        {{ Form::label('cpf_cnpj', 'CPF ou CNPJ:') }}
                        {{ Form::text('cpf_cnpj') }}



                        {{ Form::label('telefone', 'Telefone:') }}
                        {{ Form::text('telefoneCelular') }}

                        {{ Form::label('cidade', 'Cidade:') }}
                        {{ Form::text('cidade') }}

                        {{ Form::label('uf', 'UF:') }}
                        {{ Form::text('uf') }}

                        {{ Form::label('bairro', 'Bairro:') }}
                        {{ Form::text('bairro') }}

                        {{ Form::label('complemento', 'Complemento') }}
                        {{ Form::text('complemento') }}
                        <br>
                        {{ Form::submit('Enviar') }}

                        {!! Form::close() !!}


                    </div>
                </div>
                {{-- card card-primary --}}
            </div>
        </div>
    </div>
@endsection
