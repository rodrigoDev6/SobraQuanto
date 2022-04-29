@extends('adminlte::page')

@section('title', 'Sobra Quanto')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-3">Categoria Selecionada:</h1>


            {{-- procurando categoria de produto --}}
            {{ Form::model($CategoriaProduto, ['route' => ['categoriaProduto.update', $CategoriaProduto->id],'method' => 'PUT']) }}
            <div class="card card-primary ">
                <div class="card-header">{{ __('Dashboard') }}</div>

                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
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



                <div class="row col-12">
                    <div class="form-group col">
                        {{ Form::label('nome', 'Nome:') }}
                        {{ Form::text('nome', $CategoriaProduto->nome, ['class' => 'form-control']) }}
                    </div>

                    <div class="row col-12">
                        <div class="form-group col">
                          
                            {{ Form::submit('Enviar', ['class' => 'btn btn-primary']) }}

                            <a class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" href="">Excluir</a>

                            <a class="btn btn-default float" href="{{ route('categoriaProduto') }}">Cancelar</a>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-center">Confirma a exclusão do registro?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-danger">Excluir permanentemente</button>
      </div>
    </div>
  </div>
</div>
            @endsection
            @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
            <link rel="icon" href="img/sobraquanto.png">

            @stop