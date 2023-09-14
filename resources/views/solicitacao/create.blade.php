@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="text-center"> <b> Nova Solicitação </b> </h3>

        <form method="POST" action="{{ route('solicitacao.store') }}" id="solicitacao-form" >
            @csrf

            <div class="row">
                <div class="col-md-3"> </div>

                <div class="col-md-2">
                    <label for="colaborador"> Colaborador </label>

                    <select class="form-select" name="colaborador_id" id="colaborador">
                        <option value="" selected hidden> Selecione o colaborador </option>
                        @foreach($colaboradores as $colaborador)
                            <option value="{{$colaborador->id}}"> {{ $colaborador->nome }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2">
                    <label for="epi"> EPI </label>

                    <select class="form-select" name="epi_id" id="epi">
                        <option value="" selected hidden> Selecione o colaborador </option>
                        @foreach($epis as $epi)
                            <option value="{{$epi->id}}"> {{ $epi->nome }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2">
                    <label for="quantidade"> Quantidade </label>
                    <input class="form-control" type="number" id="quantidade" name="quantidade">
                </div>

                <div class="col-md-2">
                    <br>
                    <button class="btn btn-success" id="adicionar-item" type="button"> Adicionar </button>
                </div>
            </div>

            <br> <br> <br>

            <div class="row">
                <div class="col-md-1"> </div>

                <div class="col-md-10">
                    <table class="table" id="itens-selecionados">
                        <thead>
                        <tr style="background-color: #AD7210; color: white;">
                            <th scope="col" class="text-center">Colaborador</th>
                            <th scope="col" class="text-center">EPI</th>
                            <th scope="col" class="text-center">Quantidade</th>
                            <th scope="col" class="text-center">Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-md-10"> </div>

                <div class="col-md-1">
                    <button class="btn btn-success" type="submit"> Solicitar </button>
                </div>

            </div>
        </form>
    </div>

    <!-- Inclua a biblioteca Font Awesome (caso ainda não tenha incluído) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#adicionar-item").click(function() {
                var colaborador = $("#colaborador option:selected").text();
                var epi = $("#epi option:selected").text();
                var quantidade = $("#quantidade").val();

                var colaborador_id = $("#colaborador option:selected").val();
                var epi_id = $("#epi option:selected").val();

                if (colaborador && epi && quantidade) {
                    var newRow = $("<tr>");
                    newRow.append("<td class='text-center'><input type='hidden' name='colaborador[]' value='" + colaborador_id + "'>" + colaborador + "</td>");
                    newRow.append("<td class='text-center'><input type='hidden' name='epi[]' value='" + epi_id + "'>" + epi + "</td>");
                    newRow.append("<td class='text-center'><input type='hidden' name='quantidade[]' value='" + quantidade + "'>" + quantidade + "</td>");
                    newRow.append("<td class='text-center'><a class=\"remover-item\"><i class=\"fas fa-trash-alt text-danger\"></i></a></td>");
                    $("#itens-selecionados tbody").append(newRow);

                    // Limpar campos após a adição
                    $("#colaborador").val("");
                    $("#epi").val("");
                    $("#quantidade").val("");
                }
            });

            // Adicionar funcionalidade para remover linhas
            $("#itens-selecionados").on("click", ".remover-item", function() {
                if (confirm('Você tem certeza que deseja apagar este item?')) {
                    $(this).closest("tr").remove();
                }
            });

            $("#solicitar").click(function() {
                // Envie o formulário normalmente, todos os campos serão enviados como arrays
                $("#solicitacao-form").submit();
            });
        });
    </script>
@endsection
