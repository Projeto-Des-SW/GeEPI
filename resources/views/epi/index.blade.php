@extends('layouts.app')

@section('content')

    <style>
        .custom-container {
            height: 115%; /* Defina a altura desejada, pode ser em pixels, porcentagem, etc. */
        }
    </style>

    <div class="container">
        <h1 class="text-center"> EPIs </h1>

        <div class="row">
            <div class="col-md-1"></div>

            <div class="col-md-2">
                <a class="btn btn-secondary" href="{{ route('home') }}"> Voltar </a>
            </div>

            <div class="col-md-7"></div>

            <div class="col-md-2">
                <a class="btn btn-success" href="{{ route('epi.create') }}"> Cadastrar </a>
            </div>
        </div>

        <br>

        <div class="row">
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
        </div>

        <div class="row">
            <div class="col-md-1"> </div>
            <div class="col-md-10">
                <table class="table" id="tabela_epi">
                    <thead>
                        <tr style="background-color: #AD7210; color: white;">
                            <th scope="col" class="text-center">
                                EPI
                                <a href="#" class="sort-icon" data-sort="asc">
                                    <i class="fas fa-sort text-white"></i>
                                </a>
                            </th>
                            <th scope="col" class="text-center">Quantidade Mínima</th>
                            <th scope="col" class="text-center">Certificado de Aprovação- CA</th>
                            <th scope="col" class="text-center">Editar/Apagar</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($epis as $epi)
                            <tr>
                                <td class="text-center">{{ $epi->nome }} </td>
                                <td class="text-center">{{ $epi->quantidade_minima }}</td>
                                <td class="text-center">{{ $epi->certificado_aprovacao }}</td>
                                <td class="text-center">
                                    <a href="{{ route('epi.edit', ['epi_id' => $epi->id]) }}" class="m-2">
                                        <img src="/images/funcionalidades/edit.svg">
                                    </a>

                                    <a href="{{ route('epi.delete', ['epi_id' => $epi->id]) }}" class="m-3" onclick="return confirm('Tem certeza de que deseja excluir este item?')">
                                        <img src="/images/funcionalidades/delete.svg">
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            var order = 'asc'; // Inicialmente, a ordem é ascendente

            $(".sort-icon").click(function() {
                if (order === 'asc') {
                    // Ordenar em ordem ascendente (A-Z)
                    var sortedRows = $('#tabela_epi tbody tr').toArray().sort(function(a, b) {
                        var aText = $(a).find('td:eq(0)').text().toUpperCase();
                        var bText = $(b).find('td:eq(0)').text().toUpperCase();
                        return aText.localeCompare(bText);
                    });
                    $('#tabela_epi tbody').empty().append(sortedRows);
                    order = 'desc';
                    $(this).find('i').removeClass('fa-sort-alpha-up').addClass('fa-sort-alpha-down');
                } else {
                    // Ordenar em ordem descendente (Z-A)
                    var sortedRows = $('#tabela_epi tbody tr').toArray().sort(function(a, b) {
                        var aText = $(a).find('td:eq(0)').text().toUpperCase();
                        var bText = $(b).find('td:eq(0)').text().toUpperCase();
                        return bText.localeCompare(aText);
                    });
                    $('#tabela_epi tbody').empty().append(sortedRows);
                    order = 'asc';
                    $(this).find('i').removeClass('fa-sort-alpha-down').addClass('fa-sort-alpha-up');
                }
            });
        });
    </script>
@endsection
