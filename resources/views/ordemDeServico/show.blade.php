@extends('adminlte::page')

@section('title', 'Sobra Quanto')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card card-primary mt-5">
                    <div class="card-header h3 mt">{{ __('Ordem de Servicço Selecionada:') }}
                    </div>

                    <div class="card-body col-12">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="icon" href="img/sobraquanto.png">
@stop
@section('js')
    <script>
        $('.servico').on('change', function() {
            let texto = $('#servico :selected').text();
            $('#servicoNome').val(texto);
        });
    </script>
@stop
