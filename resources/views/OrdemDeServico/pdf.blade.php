<!doctype html>
<html lang="pt-br">

<head>
    <title>Sobra Quanto</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        .flex-container {
            display: inline-flex;
            width: 100%;
        }

        

        table{
            font-size: x-small;
        }
        tfoot tr td{
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }

        front-page {
        page: front-page;
        }

        front-page-title {
          display:block;
          text-align:center;
          margin-top:3in;
          font-size:2em;
          font-family:arial, helvetica, sans-serif;
          font-weight:bold;
        }
        </style>
</head>

<body>
  @php($hoje = date('d/m/Y H:i'))
  <div class="col-12">
    <p>
    <img src="{{ URL::asset('vendor/adminlte/dist/img/logo.jpg') }}" alt="bar code" height="50px" width="50px" />
      Jubao Informática - Ordem de Serviço
  </p>
    <small class="float-right">Emitada em: {{ $hoje }}</small>
        </div>

    <table width="100%">

        <tr>
            <td><strong>De:</strong> Rafael - Rio de janeiro</td>
            {{-- <td><strong>Para:</strong>  - Rio de janeiro</td> --}}
        </tr>
    
    </table>

      <br/>
      <hr>
      <br/>

        <div class="flex-container">

        <div class="col-sm-4">
            <b>Número da Ordem de Serviço: {{ $data[0]['id'] }}</b><br>
            <br>
            <b>Cliente:</b> {{$data[2]['nome'] }}<br>
            <b>Abertura: {{ date('d/m/Y', strtotime($data[0]['data_abertura'])) }}
            <b>Fechamento: {{ date('d/m/Y', strtotime($data[0]['data_fechamento'])) }} </b>
                  
        </div>
        
        </div>

        <br />
        <br />
    
      <table width="100%" height="50%">
        <thead style="background-color: lightgray;">
          <tr>
            <th>#</th>
            <th>Serviço</th>
            <th>Quantidade</th>
            <th>Valor unitário R$</th>
            <th>Total R$</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data[1] as $key => $item)
              <tr>
                <th scope="row"></th>
                <td>{{ $item['servico_nome'] }} </td>
                <td align="text-left">{{ $item['quantidade'] }} </td>
                <td align="text-left">{{ $item['valor'] }}</td>
                <td align="text-left">{{ $item['valor'] * $item['quantidade'] }}</td>
              </tr>
            @endforeach
        </tbody>
    
        <tfoot>
            <tr>
                <td colspan="3"></td>
                <td align="right"> </td>
            </tr>
            <tr>
                <td colspan="3"></td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td align="right">Total R$</td>
                <td align="left" class="gray" style="padding-left: 8px"> {{ $data[0]['total']}}  </td>
            </tr>
        </tfoot>
      </table>
       
       


</div>

</section>

</body>

</html>
