@if ($cartServico)

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

        @foreach ($cartServico as $key => $value)
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
