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


                        <form action="{{ route('ordemDeServico.update', ['id' => $ordemDeServico->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 p-2">
                                <div class="form-group col">
                                    {{ Form::label('cliente', 'Cliente:', ['class' => 'h5', 'id' => 'cliente']) }}
                                    {{ Form::text('cliente', $cliente->nome, ['class' => 'form-control']) }}
                                </div>

                                <div class="form-group col">
                                    {{ Form::label('status', 'Status:', ['class' => 'h5']) }}
                                    {{ Form::select('status_id', $ordemDeServicoStatus, $ordemDeServico->status_id, ['class' => 'form-control', 'placeholder' => '-Escolha um status-']) }}
                                </div>
                                <div class="form-group col">
                                    {{ Form::label('data_abertura', 'Abertura:', ['class' => 'h5']) }}
                                    {{ Form::date('data_abertura', new \DateTime(), ['class' => 'form-control', 'readonly' => 'true']) }}
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
                                {{ Form::textarea('observacao', $ordemDeServico->observacao, ['class' => 'form-control', 'rows' => '3']) }}
                            </div>
                            {{-- /observacao --}}

                            <div class="form-group p-2">
                                {{ Form::submit('Salvar Ordem', ['class' => 'btn btn-primary']) }}
                                <a class="btn btn-secondary" href="{{ route('ordemDeServico') }}">Cancelar</a>
                            </div>
                            {{-- /buttons --}}
                        </form>
                        {{-- input de cliente, status e pagamento --}}

                        <form action="{{ route('ordemDeServico.novoServico', ['id' => $ordemDeServico->id]) }}"
                            method="POST">
                            @csrf
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 p-2">
                                <div class="form-group col">
                                    {{ Form::label('servico', 'Serviço:', ['class' => 'h5']) }}
                                    {{ Form::select('servico_id', $servicos, '', ['class' => 'form-control servico', 'id' => 'servico', 'placeholder' => '-Escolha um serviço-', 'required']) }}
                                    <input type="hidden" id="servicoNome" name="servicoNome">

                                </div>

                                <div class="form-group col">
                                    {{ Form::label('valor', 'Valor unitário:', ['class' => 'h5']) }}
                                    {{ Form::text('valor', '', ['class' => 'form-control', 'required']) }}
                                </div>

                                <div class="form-group col">
                                    {{ Form::label('quantidade', 'Quantidade:', ['class' => 'h5']) }}
                                    {{ Form::number('quantidade', 1, ['min' => 1, 'class' => 'form-control', 'required']) }}
                                </div>

                                <div class="form-group"
                                    style="text-align: center;display: flex;flex-direction: column;justify-content: flex-end;">
                                    <button type="submit" class="btn btn-primary" id="addServico" style="width: 20%;">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                        {{-- tabela de servicos --}}
                        @if ($ordemDeServicoSevico)

                            <table class="table table-bordered table-hover dataTable dtr-inline">
                                <thead class="text-center">
                                    <tr>
                                        <th class="h4" style="font-weight:700">Nome</th>
                                        <th class="h4" style="font-weight:700 ">Valor</th>
                                        <th class="h4" style="font-weight:700 ">Quantidade</th>
                                        <th class="h4" style="font-weight:700 ">Total</th>
                                        <th class="h4" style="font-weight:700 ">Excluir</th>
                                    </tr>
                                </thead>

                                @php($totalGeral = 0)

                                <tbody class="text-center">
                                    @foreach ($ordemDeServicoSevico as $key => $value)
                                        <tr>
                                            <td class="align-middle">{{ $value->servico->nome }}</td>
                                            <td class="align-middle">R$ {{ $value->valor }}</td>
                                            <td class="align-middle">{{ $value->quantidade }}</td>
                                            <td class="align-middle">R$ {{ $value->valor * $value->quantidade }}</td>
                                            <td class="align-middle">
                                                {{ Form::open(['url' => 'removeServicoServico/' . $value->id]) }}
                                                {{ Form::hidden('_method', 'DELETE') }}
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                {{ Form::close() }}
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                    </div>
                </div>
                {{-- /tabela de servicos --}}
            @else
                <div>
                    <p class="h4" style="font-family: Open Sans; font-weight: 700">Não há serviços !!</p>
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
@section('js')
    <script>
        $('.servico').on('change', function() {
            let texto = $('#servico :selected').text();
            $('#servicoNome').val(texto);
        });
    </script>
@stop
