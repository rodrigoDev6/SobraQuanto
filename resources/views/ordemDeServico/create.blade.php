@extends('adminlte::page')

@section('title', 'Sobra Quanto')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card card-primary mt-5">
                    <div class="card-header h3 mt">{{ __('Nova Ordem de Servicço:') }}
                    </div>


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





                        {!! Form::open(['url' => '/ordemDeServico/create']) !!}
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 p-4">
                            <div class="form-group col">
                                {{ Form::label('cliente', 'Cliente:', ['class' => 'h5']) }}
                                {{ Form::select('cliente', $cliente, '', ['class' => 'form-control', 'placeholder' => '-Escolha um cliente-']) }}
                            </div>

                            <div class="form-group col">
                                {{ Form::label('status', 'Status:', ['class' => 'h5']) }}
                                {{ Form::select('status', $status, '', ['class' => 'form-control', 'placeholder' => '-Escolha um status-']) }}
                            </div>
                            <div class="form-group col">
                                {{ Form::label('Data Incial:', 'Data Incial:', ['class' => 'h5']) }}
                                {{ Form::date('dataInicial', new \DateTime(), ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group col">
                                {{ Form::label('Data Final:', 'Data Final:', ['class' => 'h5']) }}
                                {{ Form::date('dataFinal', null, ['class' => 'form-control']) }}
                            </div>


                            <div class="form-group col">
                                {{ Form::label('formaPagamento', 'Pagamento:', ['class' => 'h5']) }}
                                {{ Form::select('formaPagamento', ['PIX' => 'Pix'], 1, ['class' => 'form-control', 'placeholder' => '-todos-']) }}
                            </div>
                        </div>

                        <div class="form-group p-4">
                            {{ Form::label('descricao', 'Descrição:', ['class' => 'h5']) }}
                            {{ Form::textarea('descricao', null, ['class' => 'form-control', 'rows' => '3']) }}
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
