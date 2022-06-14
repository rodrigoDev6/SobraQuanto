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
                                {{ Form::label('data_abertura', 'Abertura:', ['class' => 'h5']) }}
                                {{ Form::date('data_abertura', new \DateTime(), ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group col">
                                {{ Form::label('data_fechamento', 'Vencimento:', ['class' => 'h5']) }}
                                {{ Form::date('data_fechamento', null, ['class' => 'form-control']) }}
                            </div>


                            <div class="form-group col">
                                {{ Form::label('formaPagamento', 'Pagamento:', ['class' => 'h5']) }}
                                {{ Form::select('formaPagamento', ['pix' => 'PIX', 'credito' => 'CARTÃO DE CRÉDITO', 'dinheiro' => 'DINHEIRO'], '', ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="row row-cols-4 p-4">
                            <div class="form-group col">
                                {{ Form::label('servico', 'Serviço:', ['class' => 'h5']) }}
                                {{ Form::select('servico', $servico, '', ['class' => 'form-control', 'placeholder' => '-Escolha um serviço-']) }}
                            </div>

                            <div class="form-group col">
                                {{ Form::label('valor', 'Valor unitário:', ['class' => 'h5']) }}
                                {{ Form::text('valor', '', ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group col">
                                {{ Form::label('quantidade', 'Quantidade:', ['class' => 'h5']) }}
                                {{ Form::number('quantidade', '', ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group"
                                style="text-align: center;display: flex;flex-direction: column;justify-content: flex-end;">
                                {{-- add plus --}}
                                <button type="button" class="btn btn-primary" style="width: 20%;">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="card shadow-none">
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Serviço</th>
                                                <th scope="col">Valor</th>
                                                <th scope="col">Quantidade</th>
                                                <th scope="col">Total</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Formatação</td>
                                                <td>R$80</td>
                                                <td>1</td>
                                                <td>R$ 80</td>
                                                <td>
                                                    <button type="button" class="btn btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Formatação</td>
                                                <td>R$80</td>
                                                <td>1</td>
                                                <td>R$ 80</td>
                                                <td>
                                                    <button type="button" class="btn btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Formatação</td>
                                                <td>R$80</td>
                                                <td>1</td>
                                                <td>R$ 80</td>
                                                <td>
                                                    <button type="button" class="btn btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>


                            <div class="form-group p-4">
                                {{ Form::label('observacao', 'Observação:', ['class' => 'h5']) }}
                                {{ Form::textarea('observacao', null, ['class' => 'form-control', 'rows' => '3']) }}
                            </div>

                            <div class="form-group p-4">
                                {{ Form::submit('Salvar', ['class' => 'btn btn-primary']) }}
                                {{ Form::reset('Limpar', ['class' => 'btn btn-danger']) }}
                                {{ Form::button('Cancelar', ['class' => 'btn btn-secondary', 'onclick' => 'history.go(-1)']) }}
                            </div>

                            {{ Form::close() }}


                        </div>
                        {{-- card-primary-end --}}



                    </div>
                </div>
            </div>
        @endsection

        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
            <link rel="icon" href="img/sobraquanto.png">
        @stop
