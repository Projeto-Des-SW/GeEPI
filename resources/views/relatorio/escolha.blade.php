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
                        <option value="estoque_epis"> Estoque EPIs </option>
                    </select>
                </div>
            </div>

            <div class="row" id="data_campos"> <!-- Adicionei o id aqui -->
                <div class="col-md-4"> </div>

                <div class="col-md-2">
                    <label for="data_inicio"> Data de Início </label>
                    <input class="form-control" name="data_inicio" type="date" value="{{ old('data_inicio') }}">
                </div>

                <div class="col-md-2">
                    <label for="data_fim"> Data de Fim </label>
                    <input class="form-control" name="data_fim" type="date" value="{{ old('data_fim') }}">
                </div>
            </div>

            <br>

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


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#tipo_relatorio').change(function () {
                    if ($(this).val() === 'estoque_epis') {
                        $('#data_campos').hide();
                    } else {
                        $('#data_campos').show();
                    }
                });
            });
        </script>
    </div>
@endsection
