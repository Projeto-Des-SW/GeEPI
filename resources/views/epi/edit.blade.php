@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center"> Editar EPI </h1>

        <form method="POST" action=" {{ route('epi.update') }}">
            @csrf

            <input type="hidden" name="epi_id" value="{{ $epi->id }}">

            <div class="row">
                <div class="col-md-4"> </div>

                <div class="col-md-4">
                    <label for="nome_epi"> EPI </label>
                    <input class="form-control" type="text" name="nome" id="nome_epi" value="{{ $epi->nome }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"> </div>

                <div class="col-md-4">
                    <label for="quant_minima"> Quantidade Mínima </label>
                    <input class="form-control" type="number" name="quantidade_minima" id="quant_minima" value="{{ $epi->quantidade_minima }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"> </div>

                <div class="col-md-4">
                    <label for="ca_epi"> CA - Certificado de Aprovação </label>
                    <input class="form-control" type="text" name="certificado_aprovacao" id="ca_epi" value="{{ $epi->certificado_aprovacao }}" maxlength="6" required>
                </div>
            </div>

            </br>

            <div class="row">
                <div class="col-md-5"> </div>

                <div class="col-md-1">
                    <a type="submit" class="form-control btn btn-secondary" href="{{ route('epi.index') }}"> Voltar </a>
                </div>

                <div class="col-md-1">
                    <button type="submit" class="form-control btn btn-success"> Atualizar </button>
                </div>
            </div>
        </form>
    </div>
@endsection
