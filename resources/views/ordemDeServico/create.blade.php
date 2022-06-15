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

                        {{ Form::open(['url' => '/addServico/create']) }}
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 p-2">
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
                        {{-- input de cliente, status e pagamento --}}

                        <div class="row row-cols-4 p-2">
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
                                <button type="submit" class="btn btn-primary" style="width: 20%;">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        {{-- /input de servico --}}


                        <div class="form-group">
                            <div class="card shadow-none  text-center">
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="h4" style="font-weight:700 ">Serviço</th>
                                                <th class="h4" style="font-weight:700 ">Valor</th>
                                                <th class="h4" style="font-weight:700 ">Quantidade</th>
                                                <th class="h4" style="font-weight:700 ">Total</th>
                                                <th class="h4" style="font-weight:700 "></th>
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
                            {{-- /tabela de servicos --}}


                            <div class="form-group p-2">
                                {{ Form::label('observacao', 'Observação:', ['class' => 'h5']) }}
                                {{ Form::textarea('observacao', null, ['class' => 'form-control', 'rows' => '3']) }}
                            </div>
                            {{-- /observacao --}}

                            <div class="form-group p-2">
                                {{ Form::submit('Salvar', ['class' => 'btn btn-primary']) }}
                                {{ Form::reset('Limpar', ['class' => 'btn btn-danger']) }}
                                {{ Form::button('Cancelar', ['class' => 'btn btn-secondary', 'onclick' => 'history.go(-1)']) }}
                            </div>
                            {{-- /buttons --}}

                            {{ Form::close() }}
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
