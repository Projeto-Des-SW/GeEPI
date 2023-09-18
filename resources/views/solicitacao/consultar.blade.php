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
                <a class="btn btn-secondary" href="{{ route('home') }}"> Voltar </a>
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
                        <th scope="col" class="text-center">Data</th>
                        <th scope="col" class="text-center">Setor</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col" class="text-center">Visualizar Itens</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($solicitacoes as $solicitacao)
                        <tr>
                            <td class="text-center"><b>{{ $solicitacao->id }}</b> </td>
                            <td class="text-center"><b>{{ $solicitacao->data_criado }}</b></td>
                            <td class="text-center"><b>{{ $solicitacao->user->setor->nome }}</b></td>
                            <td class="text-center"><b>{{ $solicitacao->status }}</b></td>
                            <td class="text-center">
                                <button class="btn btn-secondary epis_solicitacao" data-bs-toggle="modal" data-bs-target="#exampleModal" id="epis_solicitacao" data-solicitacao="{{$solicitacao->id}}">
                                <b>Ver</b>
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
                    <h4 class="modal-title mx-auto" id="exampleModalLabel"> <b>Análise de Solicitação<b> </h4>
                    <button type="buttonodal-title " class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="container form" method="POST" action="{{ route('solicitacao.finalizar') }}">
                    @csrf
                    <table class="table">
                        <thead>
                        <tr style="background-color: #AD7210; color: white;">
                            <th scope="col" class="text-center">Colaborador</th>
                            <th scope="col" class="text-center">EPI</th>
                            <th scope="col" class="text-center">Quant. Solicitada</th>

                        </tr>
                        </thead>

                        <tbody id="itens-solicitacao">
                        </tbody>
                    </table>

                </form>

            </div>
        </div>
    </div>

    <script>
        $('.epis_solicitacao').click(function () {
            var solicitacao = $(this).data('solicitacao');

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
