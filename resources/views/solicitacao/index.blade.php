@extends('layouts.app')

@section('content')
    <div class="container rounded-5" style="background: white">
        </br>
        <div class="row">
            <div class="col-md-3"> </div>

            <div class="col-md-2">
                <a href="{{ route('solicitacao.analisar') }}">
                    <img style="width: 125%" src="/images/home/analisar_solicitacao.svg">
                </a>
            </div>

            <div class="col-md-2"> </div>

            <div class="col-md-2">
                <a href="{{ route('solicitacao.finalizada') }}">
                    <img style="width: 125%" src="/images/home/solicitacoes_finalizadas.svg">
                </a>
            </div>

        </div>

        </br>

        <div class="col-md-2"> </div>
    </div>
    </div>
@endsection
