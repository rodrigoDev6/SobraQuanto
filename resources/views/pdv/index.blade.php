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
                            {{ Form::open(['class' => 'addProduto']) }}
                            {{ Form::hidden('produto_id', $produtoItem->id) }}
                            {{ Form::hidden('nome', $produtoItem->nome) }}
                            <h5 class="card-title">{{ $produtoItem->nome }}</h5>
                            <p class="card-text">{{ $produtoItem->valor }}</p>
                            <hr>
                            <div class="quantity">
                                {{ Form::number('quantidade', 1, ['min' => '1']) }}
                            </div>

                            <div class="d-flex align-items-center">
                                <div class="btn btn-items btn-items-decrease">-</div>
                                <input class="form-control text-center input-items" type="text" value="0">
                                <div class="btn btn-items btn-items-increase">+</div>
                            </div>

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
        <div class="row row-cols-2 p-4 justify-content-start">
            <div class="card">
                <h5 class="card-header bg-black">Caixa de Vendas</h5>
                <div class="card-body text-center">
                    <h5 class="card-title text-center">Seu caixa está vazio</h5>

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
