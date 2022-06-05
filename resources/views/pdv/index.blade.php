@extends('adminlte::page')

@section('title', 'Sobra Quanto')

@section('content_header')
    <h1>Painel de venda</h1>
@stop

@section('content')
    <p>PDV onde as vendas do caixa serão realizadas. Tela 10/43</p>
    @if (\Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {!! \Session::get('message') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    {{-- container principal --}}
    <div class="row row-cols-1">

        {{-- container de produtos listados --}}
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 p-4 bg-light">
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
                            <span> Estoque: {{ $produtoItem->quantidade }}</span>
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


        {{-- container de carrinho de compras-2-novo --}}
        <div class="row row-cols-1 p-4 justify-content-start">
            <div class="card">
                <div class="card-header" style="background-color: #485673">
                    <p class="h3" style="color: #f3f3f3">Caixa de Vendas</p>
                </div>
                <div class="card-body text-left">

                    {{-- produtos no carrinho --}}
                    @if ($cart)

                        @php($totalGeral = 0)

                        @foreach ($cart as $key => $cartItem)
                            @foreach ($cartItem as $key2 => $value)
                                <div class="card-body p-2">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        @php($totalGeral += $value['quantidade'] * $value['valor'])


                                        {{-- Coluna com id do produto --}}
                                        <div class="col-md-3 col-lg-3 col-xl-2">
                                            <p class="h5" style="font-weight: 700;">ID</p>
                                            <h5 class="lead fw-normal mb-2">{{ $value['id'] }}</h5>
                                        </div>
                                        {{-- Coluna com nome do produto --}}
                                        <div class="col-md-3 col-lg-3 col-xl-2">
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
                                        <div class="col-md-1 col-lg-1 col-xl-1 text-center">
                                            {{ Form::open(['url' => 'removeProduto/' . $key]) }}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Excluir', ['class' => 'btn btn-danger']) }}
                                            {{ Form::close() }}
                                            <br>
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

                            <a href="{{ url('/finalizarVenda') }}" class="btn btn-success">
                                Finalizar Venda
                            </a>
                            <br>
                            <div>
                                {{ Form::open(['url' => 'removeCart']) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Remover todos produtos', ['class' => 'btn btn-danger mt-2']) }}
                                {{ Form::close() }}
                            </div>

                        </div>
                    @else
                        <div>
                            <p class="h4" style="font-family: Open Sans; font-weight: 700">Seu caixa
                                está
                                vazio!</p>
                            <span
                                style="font-family: 'Open Sans';font-style: normal;font-weight: 800; font-size: 14px; color: #485673;">Adicione
                                itens</span>
                        </div>
                    @endif

                </div>
            </div>
        </div>

        {{-- container de carrinho de compras --}}
        <div class="row row-cols-1 p-4 justify-content-start">
            <div class="card">
                <h5 class="card-header bg-black">Caixa de Vendas</h5>
                <div class="card-body text-center">

                    <dl class="dl-horizontal" style="width: 80%; margin: 0 auto;">

                        {{-- @foreach ($produtos as $key => $cart) --}}
                        {{-- <dd>{{ $cart->id }} | {{ $cart->nome }}</dd> --}}
                        {{-- @endforeach --}}

                        @if ($cart)

                            <table class="table" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">nome</th>
                                        <th scope="col">quantidade</th>
                                        <th scope="col">valor</th>
                                        <th scope="col">total</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                @php($totaGeral = 0)

                                @foreach ($cart as $key => $value)
                                    @foreach ($value as $key2 => $value2)
                                        <tr>
                                            <td>{{ $value2['id'] }}</td>
                                            <td>{{ $value2['nome'] }}</td>
                                            <td>{{ $value2['quantidade'] }}</td>
                                            <td>{{ $value2['valor'] }}</td>
                                            <td>{{ $value2['quantidade'] * $value2['valor'] }}</td>
                                            <td>
                                                {{ Form::open(['url' => 'removeProduto/' . $key]) }}
                                                {{ Form::hidden('_method', 'DELETE') }}
                                                {{ Form::submit('Excluir', ['class' => 'btn btn-danger']) }}
                                                {{ Form::close() }}
                                            </td>
                                        </tr>
                                        @php($totaGeral += $value2['quantidade'] * $value2['valor'])
                                    @endforeach
                                @endforeach
                                </tr>
                            </table>

                            <hr>
                            <span>
                                Total = R$
                                {{ $totaGeral }}
                            </span>

                            <span> {{ Form::open(['url' => 'removeProduto/' . $key]) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Excluir', ['class' => 'btn btn-danger']) }}
                                {{ Form::close() }}</span>

                            <br>
                            <button class="btn btn-success" type="submit">
                                <i class="fas fa-cart-plus"></i>
                                Finalizar Venda
                            </button>
                        @else
                            <div>
                                <p class="h4" style="font-family: Open Sans; font-weight: 700">Seu caixa
                                    está
                                    vazio!</p>
                                <span
                                    style="font-family: 'Open Sans';font-style: normal;font-weight: 800; font-size: 14px; color: #485673;">Adicione
                                    itens</span>
                            </div>
                        @endif
                    </dl>
                </div>
            </div>
        </div>


    </div>





@stop

@section('script')

    <script>
        $(function() {
            $('form[class="addProduto"]').submit(function(event) {
                event.preventDefault();
                setTimeout(function() {
                    $('#mensagem').fadeOut(1000);
                }, 2000);

                $.ajax({
                    type: "post",
                    url: "{{ route('pdv.addProduto') }}",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response) {

                        $("#mensagem").empty();
                        $('#mensagem').show();
                        $('#mensagem').append(response.message);

                    }
                });
            });
        });

        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2000);
    </script>


@endsection
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
