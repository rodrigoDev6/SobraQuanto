@extends('adminlte::page')

@section('title', 'Sobra Quanto')

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')
    @if (\Session::has('status'))
        <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
            {!! \Session::get('status') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <script type="text/javascript">
            window.setTimeout(function() {
                $("#success-alert").fadeTo(1000, 0).slideUp(1000, function() {
                    $(this).remove();
                });

                console.log('hello')

            }, 2000);
        </script>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <a href="{{ URL::to('cliente/create') }}">
        <button class="btn btn-outline-success mb-3">
            <i class="fas fa-plus"></i>
            Adicionar cliente
        </button>
    </a>

    <div class="row row-cols-12 m-2">

        <table class="table no-margin">
            <thead>
                <tr>
                    <th>id</th>
                    <th>nome</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th><b>AÇÕES</b></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($cliente as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->nome }}</td>
                        <td>{{ $value->cpf_cnpj }}</td>
                        <td>{{ $value->telefoneCelular }}</td>
                        <td>
                            {{--  --}}
                            <a href="{{ url('cliente/' . $value->id) }}" class="btn btn-primary">
                                <i class="fas fa-eye"></i>
                                Visualizar
                            </a>
                            {{--  --}}
                            <a href="{{ url('cliente/' . $value->id . '/edit') }}" class="btn btn-info mx-5">
                                <i class="fas fa-edit"></i>
                                Editar

                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="row justify-content-center">

        {{ $cliente->links() }}
    </div>



@stop

@section('css')
    <link rel="icon" href="img/sobraquanto.png">
<link rel="stylesheet" href="{{ asset('css/admin_custom.css')}}">
<style>

    /* Fundo da página*/
    .content-wrapper {
background-color: #0A3B60 !important;
}


    /* NavBar Superior*/

.navbar-light {
    background-color: #14213D !important;
}
    /*Menu Lateral*/

[class*=sidebar-dark-] {
    background-color: #14213D !important;
}
    /*Letras da página*/
body {
    color: #fff
}
/* Letras do menu esquerdo*/
[class*=sidebar-dark-] .sidebar a {
    color: #fff;
}

.navbar-light .navbar-nav .nav-link {
    color: #fff;
}

.btn-outline-success{
    color: #fff;
    background-color: #28a745;
}

.page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #14213D;
    border-color: #14213D;
}


</style>
@stop
