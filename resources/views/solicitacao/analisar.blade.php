@extends('layouts.app')

@section('content')

    <style>
        .custom-container {
            height: 115%; /* Defina a altura desejada, pode ser em pixels, porcentagem, etc. */
        }
    </style>

    <div class="container">
        <h1 class="text-center"> <b> Solicitações </b> </h1>

        <div class="row">
            <div class="col-md-1"></div>

            <div class="col-md-2">
                <a class="btn btn-secondary" href="{{ route('solicitacao.index') }}"> Voltar </a>
            </div>
        </div>

        <br>

        <!-- <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="container custom-container" style="background-color: #AD7210;" >
                    <br>
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <form action="{{ route('epi.search') }}" method="GET" class="mb-3">
                            <div class="input-group">
                                <input type="text" class="form-control rounded-pill" name="search" placeholder="Pesquisar por nome..." >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="row">
            <div class="col-md-1"> </div>
            <div class="col-md-10">
                <table class="table">
                    <thead>
                    <tr style="background-color: #AD7210; color: white;">
                        <th scope="col" class="text-center">Nº da Solicitação</th>
                        <th scope="col" class="text-center">Fiscal</th>
                        <th scope="col" class="text-center">Data</th>
                        <th scope="col" class="text-center">Setor</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col" class="text-center">Ação</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($solicitacoes as $solicitacao)
                        <tr>
                            <td class="text-center">{{ $solicitacao->id }} </td>
                            <td class="text-center">{{ $solicitacao->user->nome }}</td>
                            <td class="text-center">{{ $solicitacao->data_criado }}</td>
                            <td class="text-center">{{ $solicitacao->user->setor->nome }}</td>
                            <td class="text-center">{{ $solicitacao->status }}</td>
                            <td class="text-center">
                                <button class="btn btn-secondary epis_solicitacao" data-bs-toggle="modal" data-bs-target="#exampleModal" id="epis_solicitacao" data-solicitacao="{{$solicitacao->id}}">
                                    <b>Analisar</b>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"> <b>Análise de Solicitação</b> </h4>
                    <button type="buttonodal-title " class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="container form" method="POST" action="{{ route('solicitacao.finalizar') }}" id="form_finalizar_solicitacao">
                    @csrf
                    <table class="table">
                        <thead>
                        <tr style="background-color: #AD7210; color: white;">
                            <th scope="col" class="text-center">Colaborador</th>
                            <th scope="col" class="text-center">EPI</th>
                            <th scope="col" class="text-center">Quant. Solicitada</th>
                            <!-- <th scope="col" class="text-center">Quant. Aprovada</th> -->
                        </tr>
                        </thead>

                        <tbody id="itens-solicitacao">
                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col-md-1"> </div>

                        <div class="col-md-12">
                            <label for="observacao_administrador"> <b>Observações:</b> </label>
                            <textarea class="form-control" id="observacao_administrador" name="observacao_administrador" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer row justify-content-center">
                        <div class="col-1"></div>
                        <div class="col-3">
                            <button name="action" value="reprovar" type="submit" class="btn btn-danger">Reprovar</button>
                        </div>
                        <div class="col-3">
                            <button name="action" value="aprovar" type="submit" class="btn btn-success">Aprovar</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        $('.epis_solicitacao').click(function () {
            var formulario = document.getElementById("form_finalizar_solicitacao");
            var solicitacao = $(this).data('solicitacao');

            var input = document.getElementById("input_id");

            if(input)
            {
                formulario.removeChild(input);
            }

            var input_solicitacao = document.createElement("input");

            input_solicitacao.type = "hidden";
            input_solicitacao.name = "id";
            input_solicitacao.value = solicitacao;
            input_solicitacao.id = "input_id";

            formulario.appendChild(input_solicitacao);


            $.ajax({
                url: '/solicitacao/get/epis/' + solicitacao,
                type: 'GET',
                dataType: 'json',
                success: function (epis_solicitacao)
                {
                    var tbody = $('#itens-solicitacao');
                    tbody.empty();

                    $.each(epis_solicitacao, function (index, item) {
                        var row = '<tr>' +
                            '<td class="text-center">' + item.nome_colaborador + '</td>' +
                            '<td class="text-center">' + item.nome_epi + '</td>' +
                            '<td class="text-center">' + item.quantidade_solicitada + '</td>' +
                            //'<td class="text-center"> <input class="text-center" type="text" maxlength="3" pattern="[0-9]+" style="width: 20%" name="quantidade_aprovada[]"> </td>' +
                            '</tr>';
                        tbody.append(row);
                    });
                }
            });
        });
    </script>

@endsection
