<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto</title>
</head>
<body>
@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                
                <script>
                    function ConfirmDelete() {
                        return confirm('Tem certeza que deseja excluir este registro?');
                    }
                </script>
                
                <a href="{{ URL::to('produto/create') }}"><button type="button" class="btn btn-block btn-success btn-sm">Criar</button></a>
                
                    <table class="table no-margin">
                        <thead>
                            <tr>
                                <th>id</th>
                                {{-- <th>categoria</th> --}}
                                <th>nome</th>
                                <th>valor</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                
                    @foreach ($produto as $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            {{-- <td>{{ $value->categoria->nome }}</td> --}}
                            <td>{{ $value->nome }}</td>
                            <td>{{ $value->valor }}</td>
                            <td><a href="{{ url('produto/' . $value->id) }}"><button type="button" class="btn btn-block btn-primary btn-sm">Visualizar</button></a></td>
                            <td><a href="{{ url('produto/' . $value->id . '/edit') }}"><button type="button" class="btn btn-block btn-warning btn-sm">Editar</button></a></td>
                            <td>
                                {{ Form::open(array('url' => 'produto/' . $value->id, 'onsubmit' => 'return ConfirmDelete()')) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Excluir', array('class' => 'btn btn-danger')) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection





</body>
</html>