@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center"> Entrada de EPIs </h1>

        <form method="POST" action=" {{ route('movimento.store') }}">
            @csrf

            <input type="hidden" name="tipo" value="entrada">

            <div class="row">
                <div class="col-md-4"> </div>

                <div class="col-md-4">
                    <label for="select_epi"> Epi </label>
                    <select class="form-select" name="epi_id" id="select_epi" required>
                        <option value="" selected hidden> Selecione o epi </option>
                        @foreach($epis as $epi)
                            <option value="{{$epi->id}}"> {{ $epi->nome }} </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"> </div>

                <div class="col-md-4">
                    <label for="quantidade_entrada"> Quantidade </label>
                    <input class="form-control" type="number" name="quantidade" id="quantidade_entrada" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"> </div>

                <div class="col-md-4">
                    <label for="descricao_entrada"> Descrição </label>
                    <textarea class="form-control" type="text" name="descricao" id="descricao_entrada" rows="2" required></textarea>
                </div>
            </div>

            </br>

            <div class="row">
                <div class="col-md-5"> </div>

                <div class="col-md-1">
                    <a type="submit" class="form-control btn btn-secondary" href="{{ route('estoque.index') }}"> Voltar </a>
                </div>

                <div class="col-md-1">
                    <button type="submit" class="form-control btn btn-success"> Registrar </button>
                </div>
            </div>

        </form>
    </div>

@endsection
