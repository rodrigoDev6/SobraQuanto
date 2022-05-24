@extends('adminlte::page')

@section('title', 'Sobra Quanto')

<head>
    <style>
        .card-title {
            float: none !important;
        }

    </style>
</head>

@section('content_header')
    <h1>Painel de venda</h1>
@stop

@section('content')
    <p>PDV onde as vendas do caixa serão realizadas. Tela 10/43</p>


    {{-- container principal --}}
    <div class="row row-cols-1">

        {{-- container de produtos listados --}}
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 p-4 bg-light">
            @foreach ($produtos as $key => $produtoItem)
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            {{ Form::open(['url' => '/addProduto', 'class' => 'addProduto']) }}
                            {{ Form::hidden('produto_id', $produtoItem->id) }}
                            {{ Form::hidden('nome', $produtoItem->nome) }}
                            <h5 class="card-title">{{ $produtoItem->nome }}</h5>
                            <p class="card-text">{{ $produtoItem->valor }}</p>


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



        {{-- container de carrinho de compras --}}
        <div class="row row-cols-1 p-4 justify-content-start">
            <div class="card">
                <h5 class="card-header bg-black">Caixa de Vendas</h5>
                <div class="card-body text-center">

                    @if (\Session::has('message'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('message') !!}</li>
                            </ul>
                        </div>
                    @endif
                    <dl class="dl-horizontal" style="width: 80%; margin: 0 auto;">

                        <dt>Total:</dt>
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
                                                {{ Form::close() }}</td>
                                        </tr>
                                        @php($totaGeral += $value2['quantidade'] * $value2['valor'])
                                    @endforeach
                                @endforeach
                                </tr>
                            </table>
                            <b>Total geral = R$
                                {{ $totaGeral }} </b> <br>


                            <a class="btn btn-lg btn-success mb-2" href="{{ URL::to('/checkout') }}">Realizar pedido</a>
                        @else
                            Carrinho vazio!
                        @endif

                    </dl>

                    <hr>

                    <span>Total:</span>
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
    </script>


@endsection
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
