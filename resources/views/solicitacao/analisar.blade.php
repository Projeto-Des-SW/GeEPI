@extends('layouts.app')

@section('content')

    <style>
        .custom-container {
            height: 115%; /* Defina a altura desejada, pode ser em pixels, porcentagem, etc. */
        }
    </style>

    <div class="container">
        <h1 class="text-center"> Solicitações </h1>

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
                            <td class="text-center">{{ $solicitacao->created_at }}</td>
                            <td class="text-center">{{ $solicitacao->user->setor->nome }}</td>
                            <td class="text-center">{{ $solicitacao->status }}</td>
                            <td class="text-center">
                                <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="epis_solicitacao" value="{{$solicitacao->id}}">
                                    Analisar
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
                    <h5 class="modal-title" id="exampleModalLabel">Análise de Solicitação</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="container form"
                      method="GET">
                    <table class="table">
                        <thead>
                        <tr style="background-color: #AD7210; color: white;">
                            <th scope="col" class="text-center">Colaborador</th>
                            <th scope="col" class="text-center">EPI</th>
                            <th scope="col" class="text-center">Quantidade</th>
                            <th scope="col" class="text-center">Estoque</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($solicitacoes as $solicitacao)
                            <tr>
                                <td class="text-center">{{ $solicitacao->id }} </td>
                                <td class="text-center">{{ $solicitacao->user->nome }}</td>
                                <td class="text-center">{{ $solicitacao->created_at }}</td>
                                <td class="text-center">{{ $solicitacao->user->setor->nome }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="modal-footer row justify-content-center">
                        <div class="col-1"></div>
                        <div class="col-3">
                            <button type="submit" class="btn btn-danger">Reprovar</button>
                        </div>
                        <div class="col-3">
                            <button type="submit" class="btn btn-success">Aprovar</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        $('#epis_solicitacao').click(function () {
            var solicitacao = $('#epis_solicitacao').val();
            alert(solicitacao);
            $.ajax({
                url: '/solicitacao/get/epis/' + solicitacao,
                type: 'GET',
                dataType: 'json',
                success: function (tipo_naturezas) {
                    var select = $('#select_tipo_natureza');
                    select.empty();

                    $.each(tipo_naturezas, function (index, item) {
                        select.append($('<option></option>').val(item.id).text(item.descricao));
                    });
                }
            });
        });
    </script>

@endsection
