@extends('layouts.app')

@section('content')
    <div class="container rounded-5" style="background: white">
        <div class="row">
            <div class="col-md-2"> </div>

            <div class="col-md-2">
                <a href="{{ route('setor.index') }}">
                    <img style="width: 100%" src="/images/home/gerenciar_setores_icon.svg">
                </a>
            </div>

            <div class="col-md-2">
                <a href="{{ route('estoque.index') }}">
                    <img style="width: 100%" src="/images/home/gerenciar_estoque_icon.svg">
                </a>
            </div>

            <div class="col-md-2">
                <a href="{{ route('fiscal.index') }}" >
                    <img style="width: 100%" src="/images/home/gerenciar_fiscais_icon.svg">
                </a>
            </div>

            <div class="col-md-2">
                <a href="{{ route('colaborador.index') }}">
                    <img style="width: 100%" src="/images/home/gerenciar_colaborador_icon.svg">
                </a>
            </div>

        </div>
        </br>
        <div class="row">
            <div class="col-md-3"> </div>

            <div class="col-md-2">
                <a href="{{ route('solicitacao.index') }}">
                    <img style="width: 100%" src="/images/home/solicitacoes_icon.svg">
                </a>
            </div>

            <div class="col-md-2">
                <a href="{{ route('epi.index') }}">
                    <img style="width: 100%" src="/images/home/cadastrar_epi_icon.svg">
                </a>
            </div>

            <div class="col-md-2">
                <a href="{{ route('relatorio.escolha') }}">
                    <img style="width: 100%" src="/images/home/relatorios_icon.svg">
                </a>
            </div>


        </div>

        </br>



        </br>
    </div>
@endsection
