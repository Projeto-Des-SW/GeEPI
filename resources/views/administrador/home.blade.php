@extends('layouts.app')

@section('content')
    <div class="container rounded-5" style="background: white">
        </br>
        <div class="row">
            <div class="col-md-3"> </div>

            <div class="col-md-2">
                <a>
                    <img style="width: 100%" src="/images/home/solicitacoes_icon.svg">
                </a>
            </div>

            <div class="col-md-2">
                <a>
                    <img style="width: 100%" src="/images/home/gerenciar_estoque_icon.svg">
                </a>
            </div>


            <div class="col-md-2">
                <a href="{{ route('epi.index') }}">
                    <img style="width: 100%" src="/images/home/cadastrar_epi_icon.svg">
                </a>
            </div>
        </div>

        </br>

        <div class="row">
            <div class="col-md-4"> </div>

            <div class="col-md-2">
                <a>
                    <img style="width: 100%" src="/images/home/relatorios_icon.svg">
                </a>
            </div>

            <div class="col-md-2">
                <a>
                    <img style="width: 100%" src="/images/home/gerenciar_fiscais_icon.svg">
                </a>
            </div>
        </div>

        </br>
    </div>
@endsection
