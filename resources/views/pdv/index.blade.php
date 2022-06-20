@extends('adminlte::page')

@section('title', 'Sobra Quanto')

@section('content_header')
    @if (\Session::has('message'))
        <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
            {!! \Session::get('message') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <script type="text/javascript">
            window.setTimeout(function() {
                $("#success-alert").fadeTo(1000, 0).slideUp(1000, function() {
                    $(this).remove();
                });
                // console.log('hello')
            }, 2000);
        </script>
    @endif
@stop

@section('content')


    {{-- container principal --}}
    <div class="row row-cols-1">

        {{-- container de produtos listados --}}
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 p-4">
            @foreach ($produtos as $key => $produtoItem)
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            {{ Form::open(['url' => '/addProduto', 'class' => 'addProduto']) }}
                            {{ Form::hidden('id', $produtoItem->id) }}
                            {{ Form::hidden('nome', $produtoItem->nome) }}
                            {{ Form::hidden('valor', $produtoItem->valor) }}
                            <h5 class="card-title">{{ $produtoItem->nome }}</h5>
                            <p class="card-text">{{ $produtoItem->valor }}</p>
                            <span class="estoque"> Estoque: {{ $produtoItem->quantidade }}</span>
                            {{ Form::number('quantidade', 1, ['min' => 1, 'class' => 'text-center form-control col-4']) }}
                            <hr>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-cart-plus"></i>
                                Adicionar
                            </button>

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="row justify-content-center">
            {{ $produtos->links() }}
        </div>


        {{-- container de carrinho de compras-2-novo --}}
        <div class="row row-cols-1 p-4 justify-content-start">
            <div class="card">
                <div class="card-header" style="background-color: #485673">
                    <p class="h3" style="color: #f3f3f3">Caixa de Vendas</p>
                </div>
                <div class="card-body text-center">

                    {{-- produtos no carrinho --}}
                    @if ($cart)

                        @php($totalGeral = 0)

                        @foreach ($cart as $key => $cartItem)
                            @foreach ($cartItem as $key2 => $value)
                                <div class="card-body">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        @php($totalGeral += $value['quantidade'] * $value['valor'])
                                        {{-- Coluna com id do produto --}}
                                        <div class="col-md-3 col-lg-3 col-xl-2">
                                            <p class="h5" style="font-weight: 700;">ID</p>
                                            <h5 class="lead fw-normal mb-2">{{ $value['id'] }}</h5>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-2">
                                            {{-- Coluna com nome do produto --}}
                                            <p class="h5" style="font-weight: 700;">Produto</p>
                                            <h5 class="lead fw-normal mb-2">{{ $value['nome'] }}</h5>
                                        </div>
                                        {{-- coluna com quantidade --}}
                                        <div class="col-md-3 col-lg-3 col-xl-2">
                                            <p class="h5" style="font-weight: 700">Qtd</p>
                                            <h5 class="lead fw-normal mb-2">{{ $value['quantidade'] }}</h5>
                                        </div>

                                        {{-- coluna com valor unitário --}}
                                        <div class="col-md-3 col-lg-3 col-xl-2">
                                            <h5 style="font-weight: 700">Valor Unit.</h5>
                                            <h5 class="lead fw-normal mb-2">R$ {{ $value['valor'] }}</h5>
                                        </div>

                                        {{-- coluna com valor total --}}
                                        <div class="col-md-3 col-lg-3 col-xl-2">
                                            {{-- multiplica o valor unitário com a quantidade --}}
                                            <h5 style="font-weight: 700;">Total</h5>
                                            <h5 class="mb-0">R$ {{ $value['quantidade'] * $value['valor'] }}
                                            </h5>
                                        </div>

                                        {{-- coluna para remover produto --}}
                                        <div class="col-md-1 col-lg-1 col-xl-1">
                                            <div class="align-middle">

                                                {{ Form::open(['url' => 'removeProduto/' . $key, 'class' => 'excluir']) }}
                                                {{ Form::hidden('_method', 'DELETE') }}
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                {{ Form::close() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach

                        <hr>
                        <div class="card-footer text-center" style="background-color: #fff">


                            <div class="col mb-2">

                                <span class="h5" style="font-weight: 700;">Total Geral</span>

                                <span class="h5 mb-0">R$ {{ $totalGeral }}</span>
                            </div>

                            {{-- container de botões de pagamento --}}

                            <div>
                                {{ Form::open(['url' => '/fecharVenda']) }}
                                {{ Form::hidden('_method', 'POST') }}
                                {{ Form::submit('Finalizar Venda', ['class' => 'btn btn-success']) }}
                                {{ Form::close() }}
                            </div>

                            <div>
                                {{ Form::open(['url' => '/removeCart']) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Remover todos produtos', ['class' => 'btn btn-danger mt-2']) }}
                                {{ Form::close() }}
                            </div>

                        </div>
                    @else
                        <div class="text-align">
                            <p class="h4" style="font-family: Open Sans; font-weight: 700;color: #0a0a0a;">
                                Seu caixa está vazio!</p>
                            <span class="h6"
                                style="font-family: 'Open Sans';font-style: normal;font-weight: bold; color: #485673;">Adicione
                                itens</span>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@stop

@section('css')

    <link rel="stylesheet" href="./css/admin_custom.css">
    {{-- <link rel="stylesheet" href="./css/admin_custom.css"> --}}


@stop
