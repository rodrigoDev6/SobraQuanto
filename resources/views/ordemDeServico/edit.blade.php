@extends('adminlte::page')

@section('title', 'Sobra Quanto')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card card-primary mt-5">
                    <div class="card-header h3 mt">{{ __('Ordem de Servicço Selecionada:') }}
                    </div>

                    <div class="card-body col-12">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        {{ Form::model($ordemDeServico, ['route' => ['ordemDeServico.update', $ordemDeServico->id], 'method' => 'PUT']) }}

                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 p-2">
                            <div class="form-group col">
                                {{ Form::label('cliente', 'Cliente:', ['class' => 'h5', 'id' => 'cliente']) }}
                                {{ Form::select('cliente_id', $clienteLista, $cliente->id, ['class' => 'form-control', 'placeholder' => '-Escolha um cliente-']) }}
                            </div>

                            <div class="form-group col">
                                {{ Form::label('status', 'Status:', ['class' => 'h5']) }}
                                {{ Form::select('status_id', $ordemDeServicoStatus, $statusId->id, ['class' => 'form-control', 'placeholder' => '-Escolha um status-']) }}
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
                                {{ Form::select('forma_pagamento', ['pix' => 'PIX', 'cartão' => 'CARTÃO DE CRÉDITO', 'dinheiro' => 'DINHEIRO'], $ordemDeServico->forma_pagamento, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group p-2">
                            {{ Form::label('observacao', 'Observação:', ['class' => 'h5']) }}
                            {{ Form::textarea('observacao', null, ['class' => 'form-control', 'rows' => '3']) }}
                        </div>
                        {{-- /observacao --}}

                        <div class="form-group p-2">
                            {{-- @if ($cartServico) --}}
                            {{ Form::submit('Finalizar Ordem', ['class' => 'btn btn-primary']) }}
                            {{-- @endif --}}
                            <a class="btn btn-secondary" href="{{ route('ordemDeServico') }}">Cancelar</a>
                        </div>
                        {{-- /buttons --}}

                        {{ Form::close() }}
                        {{-- input de cliente, status e pagamento --}}





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
@section('js')
    <script>
        $('.servico').on('change', function() {
            let texto = $('#servico :selected').text();
            $('#servicoNome').val(texto);
        });
    </script>
@stop
