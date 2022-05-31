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
                                        {{ Form::close() }}</td>
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

                    <br>
                    <button class="btn btn-success" type="submit">
                        <i class="fas fa-cart-plus"></i>
                        Finalizar Venda
                    </button>
                @else
                    Carrinho vazio!
                @endif
            </dl>
        </div>
    </div>
</div>
