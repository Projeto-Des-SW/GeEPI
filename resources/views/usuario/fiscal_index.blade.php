@extends('layouts.app')

@section('content')

    <style>
        .custom-container {
            height: 115%; /* Defina a altura desejada, pode ser em pixels, porcentagem, etc. */
        }
    </style>

    <div class="container">
        <h1 class="text-center"> Fiscais </h1>

        <div class="row">
            <div class="col-md-1"></div>

            <div class="col-md-2">
                <a class="btn btn-secondary" href="{{ route('home') }}"> Voltar </a>
            </div>

            <div class="col-md-7"></div>

            <div class="col-md-2">
                <a class="btn btn-success" href="{{ route('fiscal.create') }}"> Cadastrar </a>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="container custom-container" style="background-color: #AD7210;">
                    <br>
                    <div class="col-md-6">
                        <form action="{{ route('fiscal.search') }}" method="GET">
                            <div class="row">
                                <div class="col-md-3">
                                    <select class="form-select rounded-pill" name="filtro" id="select_filtro">
                                        <option value="2" style="text-align: center" selected>NOME</option>
                                        <option value="1" style="text-align: center">CPF</option>
                                    </select>
                                </div>
                                <div class="col-md-9" id="filtro_nome">
                                    <input type="text" class="form-control rounded-pill" name="search_nome" placeholder="Pesquisar por nome...">
                                </div>

                                <div class="col-md-9" id="filtro_cpf" style="display: none">
                                    <input type="text" class="form-control rounded-pill" name="search_cpf" placeholder="Pesquisar por cpf..." id="filtro_cpf">
                                </div>

                                <button type="submit" class="btn btn-primary" hidden>Pesquisar</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-1"> </div>
            <div class="col-md-10">
                <table class="table">
                    <thead>
                    <tr style="background-color: #AD7210; color: white;">
                        <th scope="col" class="text-center">Nome</th>
                        <th scope="col" class="text-center">CPF</th>
                        <th scope="col" class="text-center">Setor</th>
                        <th scope="col" class="text-center">Editar/Apagar</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($usuarios as $usuario)
                        <tr onmouseenter="">
                            <td class="text-center">{{ $usuario->nome }} </td>
                            <td class="text-center">{{ $usuario->cpf }}</td>
                            <td class="text-center">{{ $usuario->setor->nome }}</td>
                            <td class="text-center">
                                <a href="{{route('fiscal.edit', ['fiscal_id' => $usuario->id]) }}" class="m-2">
                                    <img src="/images/funcionalidades/edit.svg">
                                </a>

                                <a href="{{ route('fiscal.delete', ['fiscal_id' => $usuario->id]) }}" class="m-3" onclick="return confirm('Tem certeza de que deseja excluir este item?')">
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
        $("#select_filtro").change(function ()
        {
            if($("#select_filtro").val() == 1)
            {
                document.getElementById('filtro_cpf').style.display = 'block';
                document.getElementById('filtro_nome').style.display = 'none';
            }
            else if($("#select_filtro").val() == 2)
            {
                document.getElementById('filtro_cpf').style.display = 'none';
                document.getElementById('filtro_nome').style.display = 'block';
            }
        });
    </script>
@endsection
