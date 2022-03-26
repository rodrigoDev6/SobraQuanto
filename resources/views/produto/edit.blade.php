<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produto</title>
</head>
<body>

  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif


  {{ Form::model($produto, array('route' => array('produto.update', $produto->id), 'method' => 'PUT')) }}



  {{ Form::label('categoria', 'Categoria')}}
  {{ Form::select('categoria_id', $categorias, $produto->categoria_id)}}
  <br>

  {{ Form::label('nome', 'Nome')}}
  {{ Form::text('nome', $produto->nome);}}
  <br>

  {{ Form::label('valor', 'Valor')}}
  {{ Form::text('valor', $produto->valor) }}
  <br>
  {{ Form::submit('Enviar') }}

  {!! Form::close() !!}


</body>
</html>
