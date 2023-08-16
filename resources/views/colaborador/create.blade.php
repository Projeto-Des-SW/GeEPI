@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center"> Cadastrar Colaborador </h1>

        <form method="POST" action=" {{ route('colaborador.store') }}">
            @csrf

            <div class="row">
                <div class="col-md-4"> </div>

                <div class="col-md-4">
                    <label for="nome_fiscal"> Nome </label>
                    <input class="form-control" type="text" name="nome" id="nome_fiscal" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"> </div>

                <div class="col-md-4">
                    <label for="setor_fiscal"> Setor </label>
                    <select class="form-select" name="setor_id" id="setor_fiscal" required>
                        <option value="" selected hidden> Selecione o setor </option>
                        @foreach($setores as $setor)
                            <option value="{{$setor->id}}"> {{ $setor->nome }} </option>
                        @endforeach
                    </select>
                </div>
            </div>

            </br>

            <div class="row">
                <div class="col-md-5"> </div>

                <div class="col-md-1">
                    <a type="submit" class="form-control btn btn-secondary" href="{{ route('colaborador.index') }}"> Voltar </a>
                </div>

                <div class="col-md-1">
                    <button type="submit" class="form-control btn btn-success"> Cadastrar </button>
                </div>
            </div>

        </form>
    </div>

@endsection