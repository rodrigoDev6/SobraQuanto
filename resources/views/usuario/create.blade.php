@extends('adminlte::page')

@section('title', 'Sobra Quanto')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card card-primary mt-5">
                    <div class="card-header h3 mt">{{ __('Novo Usuario:') }}</div>


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





                        {!! Form::open(['url' => '/usuario/create']) !!}
                        <div class="row col-12">
                            <div class="form-group col-6">
                                {{-- {!! Form::label('nome', 'Nome:') !!}
                                {{ Form::text('nome', ['class' => 'form-control', 'placeholder' => 'Nome']) }} --}}
                                {!! Form::label('nome', 'Nome:') !!}
                                {!! Form::text('nome', null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}
                            </div>

                            <div class="form-group col-6">
                                {!! Form::label('email', 'E-mail:') !!}
                                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Digite seu email']) !!}

                            </div>
                            <div class="form-group col-6">
                                {!! Form::label('perfil', 'Selecione o perfil de usuário:') !!}
                                {!! Form::select('perfil', ['admin' => 'Administrador', 'padrao' => 'Padrão'], null, ['class' => 'form-control']) !!}

                            </div>

                            <div class="form-group col-6">
                                {!! Form::label('password', 'Senha:') !!}
                                {!! Form::password('senha', ['class' => 'form-control', 'placeholder' => 'Senha']) !!}
                            </div>

                        </div>





                        <div class="row col-12">
                            <div class="form-group col">
                                {{ Form::submit('Enviar', ['class' => 'btn btn-primary']) }}

                                <a class="btn btn-default float-right" href="{{ route('usuario') }}">Cancelar</a>
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
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="icon" href="img/sobraquanto.png">
@stop
