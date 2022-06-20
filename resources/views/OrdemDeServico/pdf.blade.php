<!doctype html>
<html lang="en">

<head>
    <title>Sobra Quanto</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        table {
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <div class="row">

            <h3 class="text-center font-weight-bold">Registro de Ordem de Serviço</h3>

            <div class="row">
                <div class="col-md-12">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th class="text-left">Nº Ordem</th>
                                <th class="text-left">Abertura</th>
                                <th class="text-left">Fechamento</th>
                                <th class="text-left">Cliente</th>
                                <th class="text-left">Valor total</th>
                            </tr>

                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-left">{{ $data[0]['id'] }}</td>
                                <td class="text-left">{{ date('d/m/Y', strtotime($data[0]['data_abertura'])) }}</td>
                                <td class="text-left">{{ date('d/m/Y', strtotime($data[0]['data_fechamento'])) }}</td>
                                <td class="text-left">{{ $data[2]['nome'] }}</td>
                                <td class="text-left">R$ {{ $data[0]['total'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- fim-topo --}}

        <h4 class="text-center font-weight-bold mt-4">Serviços Realizados</h4>
        <div class="row">
            <div class="col-md-8">
                <table class="table table-bordered table-hover dataTable dtr-inline">
                    <thead>
                        <tr>
                            <th class="text-left">Serviço</th>
                            <th class="text-left">Quantidade</th>
                            <th class="text-left">Valor unitário</th>
                            <th class="text-left">Valor Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data[1] as $key => $item)
                            <tr>
                                <td class="text-left">{{ $item['servico_nome'] }}</td>
                                <td class="text-left">{{ $item['quantidade'] }}</td>
                                <td class="text-left">R$ {{ $item['valor'] }}</td>
                                <td class="text-left">R$ {{ $item['valor'] * $item['quantidade'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
            </div>
        </div>
    </div>
</body>

</html>
