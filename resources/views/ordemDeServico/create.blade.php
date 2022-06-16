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

                        {{ Form::open(['url' => '/finalizarOrdem']) }}
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 p-2">
                            <div class="form-group col">
                                {{ Form::label('cliente', 'Cliente:', ['class' => 'h5']) }}
                                {{ Form::select('cliente_id', $cliente, '', ['class' => 'form-control', 'placeholder' => '-Escolha um cliente-']) }}
                            </div>

                            <div class="form-group col">
                                {{ Form::label('status', 'Status:', ['class' => 'h5']) }}
                                {{ Form::select('status_id', $status, '', ['class' => 'form-control', 'placeholder' => '-Escolha um status-']) }}
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
                                {{ Form::select('forma_pagamento', ['pix' => 'PIX', 'credito' => 'CARTÃO DE CRÉDITO', 'dinheiro' => 'DINHEIRO'], '', ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group p-2">
                            {{ Form::label('observacao', 'Observação:', ['class' => 'h5']) }}
                            {{ Form::textarea('observacao', null, ['class' => 'form-control', 'rows' => '3']) }}
                        </div>
                        {{-- /observacao --}}

                        <div class="form-group p-2">
                            {{ Form::submit('Finalizar Ordem', ['class' => 'btn btn-primary']) }}
                            <a class="btn btn-secondary" href="{{ route('ordemDeServico') }}">Cancelar</a>

                        </div>
                        {{-- /buttons --}}

                        {{ Form::close() }}
                        {{-- input de cliente, status e pagamento --}}

                        {{ Form::open(['url' => '/addServico']) }}
                        <div class="row row-cols-4 p-2">
                            <div class="form-group col">
                                {{ Form::label('servico', 'Serviço:', ['class' => 'h5']) }}
                                {{ Form::select('servico_id', $servico, '', ['class' => 'form-control', 'placeholder' => '-Escolha um serviço-']) }}


                            </div>

                            <div class="form-group col">
                                {{ Form::label('valor', 'Valor unitário:', ['class' => 'h5']) }}
                                {{ Form::text('valor', '', ['class' => 'form-control', 'required']) }}
                            </div>

                            <div class="form-group col">
                                {{ Form::label('quantidade', 'Quantidade:', ['class' => 'h5']) }}
                                {{ Form::number('quantidade', '', ['class' => 'form-control', 'required']) }}
                            </div>

                            <div class="form-group"
                                style="text-align: center;display: flex;flex-direction: column;justify-content: flex-end;">
                                <button type="submit" class="btn btn-primary" style="width: 20%;">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        {{ Form::close() }}
                        {{-- /input de servico --}}



                        <div class="form-group">
                            <div class="card shadow-none  text-center">
                                <div class="card-body">

                                    @if ($cartServico)

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="h4" style="font-weight:700">ID</th>
                                                    <th class="h4" style="font-weight:700 ">Valor</th>
                                                    <th class="h4" style="font-weight:700 ">Quantidade</th>
                                                    <th class="h4" style="font-weight:700 ">Total</th>
                                                    <th class="h4" style="font-weight:700 ">
                                                        {{ Form::open(['url' => '/removeCartServico']) }}
                                                        {{ Form::hidden('_method', 'DELETE') }}
                                                        {{ Form::submit('Limpar', ['class' => 'btn btn-danger']) }}
                                                        {{ Form::close() }}
                                                    </th>
                                                </tr>
                                            </thead>

                                            @php($totalGeral = 0)

                                            <tbody>
                                                @foreach ($cartServico as $key => $value)
                                                    @foreach ($value as $key2 => $value2)
                                                        <tr>
                                                            <td>{{ $value2['id'] }}</td>
                                                            <td>{{ $value2['valor'] }}</td>
                                                            <td>{{ $value2['quantidade'] }}</td>
                                                            <td>{{ $value2['quantidade'] * $value2['valor'] }}</td>
                                                            <td>
                                                                {{ Form::open(['url' => 'removeServico/' . $key]) }}
                                                                {{ Form::hidden('_method', 'DELETE') }}
                                                                <button type="submit" class="btn btn-danger">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                                {{ Form::close() }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endforeach

                                            </tbody>
                                        </table>

                                </div>
                            </div>
                            {{-- /tabela de servicos --}}
                        @else
                            <div>
                                <p class="h4" style="font-family: Open Sans; font-weight: 700">Não há serviços nesta
                                    ordem!!</p>
                                <span
                                    style="font-family: 'Open Sans';font-style: normal;font-weight: 800; font-size: 14px; color: #485673;">Adicione
                                    Serviços</span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- card-primary-end --}}
            </div>
        </div>
        {{-- /card principal com div e botoes --}}
    </div>
    </div>
    {{-- /linha principal dentro do container --}}
    </div>
    {{-- /container --}}
@endsection

@section('css')
    <link rel="icon" href="img/sobraquanto.png">
@stop
