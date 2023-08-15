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
                    <thead>
                        <tr style="background-color: #AD7210; color: white;">
                            <th scope="col">#</th>
                            <th scope="col" class="text-center">Setor</th>
                            <th scope="col" class="text-center">Editar/Apagar</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($setores as $setor)
                            <tr>
                                <th scope="row"></th>
                                <td class="text-center">{{ $setor->nome }} </td>
                                <td class="text-center">
                                    <a href="{{ route('setor.edit', ['setor_id' => $setor->id]) }}" class="m-2">
                                        <img src="/images/funcionalidades/edit.svg">
                                    </a>

                                    <a onclick="return confirm('Você tem certeza que deseja apagar este setor?')" href="{{ route('setor.delete', ['setor_id' => $setor->id]) }}" class="m-3" onclick="return confirm('Tem certeza de que deseja excluir este item?')">
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
@endsection