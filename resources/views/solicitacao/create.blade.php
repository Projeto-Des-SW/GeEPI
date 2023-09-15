@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="text-center"> <b> Solicitar EPIs </b> </h3>

        <br>

        <form method="POST" action="{{ route('solicitacao.store') }}" id="solicitacao-form" >
            @csrf
            <div class="row">
                <div class="col-md-1"> </div>

                <div class="col-md-4">
                    <label for="colaborador"> <b>Colaborador</b> </label>

                    <select class="form-select" name="colaborador_id" id="colaborador">
                        <option value="" selected hidden> Selecione o colaborador </option>
                        @foreach($colaboradores as $colaborador)
                            <option value="{{$colaborador->id}}"> {{ $colaborador->nome }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="epi"> <b>EPI</b> </label>

                    <select class="form-select" name="epi_id" id="epi">
                        <option value="" selected hidden> Selecione o colaborador </option>
                        @foreach($epis as $epi)
                            <option value="{{$epi->id}}"> {{ $epi->nome }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2">
                    <label for="quantidade"> <b>Quantidade</b> </label>
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
                <div class="col-md-1"> </div>

                <div class="col-md-10">
                    <label for="observacao_fiscal"> <b>Observações:</b> </label>
                    <textarea class="form-control" id="observacao_fiscal" name="observacao_fiscal" rows="4"></textarea>
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function()
        {
            $("#adicionar-item").click(function()
            {
                var colaborador = $("#colaborador option:selected").text();
                var epi = $("#epi option:selected").text();
                var quantidade = $("#quantidade").val();

                var colaborador_id = $("#colaborador option:selected").val();
                var epi_id = $("#epi option:selected").val();

                if (colaborador && epi && quantidade)
                {
                    var newRow = $("<tr>");
                    newRow.append("<td class='text-center'><input type='hidden' name='colaborador_id[]' value='" + colaborador_id + "'>" + colaborador + "</td>");
                    newRow.append("<td class='text-center'><input type='hidden' name='epi_id[]' value='" + epi_id + "'>" + epi + "</td>");
                    newRow.append("<td class='text-center'><input type='hidden' name='quantidade[]' value='" + quantidade + "'>" + quantidade + "</td>");
                    newRow.append("<td class='text-center'><a class=\"remover-item\"><i class=\"fas fa-trash-alt text-black\"></i></a></td>");
                    $("#itens-selecionados tbody").append(newRow);

                    //Limpar os campos após adionar um EPI
                    $("#colaborador").val("");
                    $("#epi").val("");
                    $("#quantidade").val("");
                }
            });

            //Remover EPI
            $("#itens-selecionados").on("click", ".remover-item", function()
            {
                if (confirm('Você tem certeza que deseja apagar este item?'))
                {
                    $(this).closest("tr").remove();
                }
            });

            // Enviar o form com os itens em arrays
            $("#solicitar").click(function()
            {
                $("#solicitacao-form").submit();
            });
        });
    </script>
@endsection
