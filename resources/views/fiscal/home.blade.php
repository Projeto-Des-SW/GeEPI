@extends('layouts.app')

@section('content')
    <div class="container rounded-5" style="background: white">
        </br>
        <div class="row">
            <div class="col-md-1"> </div>

            <div class="col-md-2">
                <a href="{{ route('solicitacao.create') }}">
                    <img style="width: 125%" src="/images/home/solicitar_epi_icon.svg">
                </a>
            </div>

            <div class="col-md-2"> </div>

            <div class="col-md-2">
                <a>
                    <img style="width: 125%" src="/images/home/consultar_solicitacao_icon.svg">
                </a>
            </div>

            <div class="col-md-2"> </div>

            <div class="col-md-2">
                <a href="{{ route('colaborador.index') }}">
                    <img style="width: 125%" src="/images/home/gerenciar_colaboradores_icon.svg">
                </a>
            </div>
        </div>

        </br>

            <div class="col-md-2"> </div>
        </div>
    </div>
@endsection
