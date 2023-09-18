@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center"> Setores </h1>

        <div class="row">
            <div class="col-md-1"></div>

            <div class="col-md-2">
                <a class="btn btn-secondary" href="{{ route('home') }}"> Voltar </a>
            </div>

            <div class="col-md-7"></div>

            <div class="col-md-2">
                <a class="btn btn-success" href="{{ route('setor.create') }}"> Cadastrar </a>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-1"> </div>
            <div class="col-md-10">
                <table class="table">
                    <table class="table" id="tabela_setor">
                    <thead>
                        <tr style="background-color: #AD7210; color: white;">
                            <th scope="col" class="text-center">
                                Setor
                                <a href="#" class="sort-icon" data-sort="asc">
                                    <i class="fas fa-sort text-white"></i>
                                </a>
                            </th>
                            <th scope="col" class="text-center">Editar/Apagar</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($setores as $setor)
                            <tr>
                                <td class="text-center">{{ $setor->nome }} </td>
                                <td class="text-center">
                                    <a href="{{ route('setor.edit', ['setor_id' => $setor->id]) }}" class="m-2">
                                        <img src="/images/funcionalidades/edit.svg">
                                    </a>

                                    <a onclick="return confirm('Você tem certeza que deseja apagar este setor?')" href="{{ route('setor.delete', ['setor_id' => $setor->id]) }}" class="m-3")">
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
                    var sortedRows = $('#tabela_setor tbody tr').toArray().sort(function(a, b) {
                        var aText = $(a).find('td:eq(0)').text().toUpperCase();
                        var bText = $(b).find('td:eq(0)').text().toUpperCase();
                        return aText.localeCompare(bText);
                    });
                    $('#tabela_setor tbody').empty().append(sortedRows);
                    order = 'desc';
                    $(this).find('i').removeClass('fa-sort-alpha-up').addClass('fa-sort-alpha-down');
                } else {
                    // Ordenar em ordem descendente (Z-A)
                    var sortedRows = $('#tabela_setor tbody tr').toArray().sort(function(a, b) {
                        var aText = $(a).find('td:eq(0)').text().toUpperCase();
                        var bText = $(b).find('td:eq(0)').text().toUpperCase();
                        return bText.localeCompare(aText);
                    });
                    $('#tabela_setor tbody').empty().append(sortedRows);
                    order = 'asc';
                    $(this).find('i').removeClass('fa-sort-alpha-down').addClass('fa-sort-alpha-up');
                }
            });
        });
    </script>
@endsection
