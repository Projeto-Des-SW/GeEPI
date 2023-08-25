@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center"> Estoque </h1>

        <div class="row">
            <div class="col-md-1"></div>

            <div class="col-md-2">
                <a class="btn btn-secondary" href="{{ route('home') }}"> Voltar </a>
            </div>

            <div class="col-md-6"></div>

            <div class="col-md-1">
                <a class="btn btn-danger" href="{{ route('movimento.saida') }}"> Saída </a>
            </div>

            <div class="col-md-1">
                <a class="btn btn-success" href="{{ route('movimento.entrada') }}"> Entrada </a>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-1"> </div>
            <div class="col-md-10">
                <table class="table">
                    <thead>
                    <tr style="background-color: #AD7210; color: white;">
                        <th scope="col" class="text-center">EPI</th>
                        <th scope="col" class="text-center">Quantidade Atual</th>
                        <th scope="col" class="text-center">Quantidade Mínima</th>
                        <th scope="col" class="text-center">Certificado de Aprovação- CA</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($epis as $epi)
                        <tr>
                            <td class="text-center">{{ $epi->nome }} </td>
                            <td class="text-center">{{ $epi->estoque->quantidade }}</td>
                            <td class="text-center">{{ $epi->quantidade_minima }}</td>
                            <td class="text-center">{{ $epi->certificado_aprovacao }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
