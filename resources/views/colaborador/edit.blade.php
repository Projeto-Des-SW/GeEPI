@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center"> Editar Colaborador </h1>

        <form method="POST" action=" {{ route('colaborador.update') }}">
            @csrf

            <input type="hidden" name="id" value="{{ $colaborador->id }}">

            <div class="row">
                <div class="col-md-4"> </div>

                <div class="col-md-4">
                    <label for="nome_colaborador"> Colaborador </label>
                    <input class="form-control" type="text" name="nome" id="nome_colaborador" value="{{ $colaborador->nome }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"> </div>
                @if(Auth::user()->tipo_usuario_id == 1)
                    <div class="col-md-4">
                        <label for="setor_fiscal"> Setor </label>
                        <select class="form-select" name="setor_id" id="setor_fiscal" required>
                            <option value="{{ $colaborador->setor->id }}" selected hidden> {{ $colaborador->setor->nome }} </option>
                            @foreach($setores as $setor)
                                <option value="{{$setor->id}}"> {{ $setor->nome }} </option>
                            @endforeach
                        </select>
                    </div>
                @elseif(Auth::user()->tipo_usuario_id == 2)
                    <input type="hidden" name="setor_id" value="{{$colaborador->setor->id}}">
                    <div class="col-md-4">
                        <label for="setor_fiscal"> Setor </label>
                        <input class="form-control" type="text" value="{{$colaborador->setor->nome}}" disabled>
                    </div>
                @endif

            </div>

            </br>

            <div class="row">
                <div class="col-md-5"> </div>

                <div class="col-md-1">
                    <a type="submit" class="form-control btn btn-secondary" href="{{ route('colaborador.index') }}"> Voltar </a>
                </div>

                <div class="col-md-1">
                    <button type="submit" class="form-control btn btn-success"> Atualizar </button>
                </div>
            </div>
        </form>
    </div>
@endsection
