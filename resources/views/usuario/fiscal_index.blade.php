@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center"> EPIs </h1>

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
            <div class="col-md-1"> </div>
            <div class="col-md-10">
                <table class="table">
                    <thead>
                    <tr style="background-color: #AD7210; color: white;">
                        <th scope="col">#</th>
                        <th scope="col" class="text-center">Nome</th>
                        <th scope="col" class="text-center">Contato</th>
                        <th scope="col" class="text-center">Setor</th>
                        <th scope="col" class="text-center">Editar/Apagar</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($usuarios as $usuario)
                        <tr>
                            <th scope="row"></th>
                            <td class="text-center">{{ $usuario->nome }} </td>
                            <td class="text-center">{{ $usuario->contato }}</td>
                            <td class="text-center">{{ $usuario->setor->nome }}</td>
                            <td class="text-center">
                                <a href="" class="m-2">
                                    <img src="/images/funcionalidades/edit.svg">
                                </a>

                                <a href="" class="m-3" onclick="return confirm('Tem certeza de que deseja excluir este item?')">
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
