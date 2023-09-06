@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center"> Relatórios </h1>

        <form method="POST" action=" {{ route('relatorio.gerar') }}" target="_blank">
            @csrf

            <div class="row">
                <div class="col-md-4"> </div>

                <div class="col-md-4">
                    <label for="tipo_relatorio"> Tipo de Relatório </label>
                    <select class="form-select" name="tipo_relatorio" id="tipo_relatorio" required>
                        <option value="" selected hidden> Selecione o tipo de relatório </option>
                        <option value="entrada"> Entrada de EPI </option>
                        <option value="saida"> Saída de EPI </option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"> </div>

                <div class="col-md-2">
                    <label for="data_inicio"> Data de Início </label>
                    <input class="form-control" name="data_inicio" type="date" value="{{ old('data_inicio') }}" required>
                </div>

                <div class="col-md-2">
                    <label for="data_fim"> Data de Fim </label>
                    <input class="form-control" name="data_fim" type="date" value="{{ old('data_fim') }}" required>
                </div>
            </div>

            </br>

            <div class="row">
                <div class="col-md-5"> </div>

                <div class="col-md-1">
                    <a type="submit" class="form-control btn btn-secondary" href="{{ route('home') }}"> Voltar </a>
                </div>

                <div class="col-md-1">
                    <button type="submit" class="form-control btn btn-success"> Gerar </button>
                </div>
            </div>

        </form>
    </div>
@endsection
