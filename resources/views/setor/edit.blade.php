@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center"> Editar Setor </h1>

        <form method="POST" action=" {{ route('setor.update') }}">
            @csrf

            <input type="hidden" name="id" value="{{ $setor->id }}">

            <div class="row">
                <div class="col-md-4"> </div>

                <div class="col-md-4">
                    <label for="nome_setor"> Setor </label>
                    <input class="form-control" type="text" name="nome" id="nome_setor" value="{{ $setor->nome }}">
                </div>
            </div>

            </br>

            <div class="row">
                <div class="col-md-5"> </div>

                <div class="col-md-1">
                    <a type="submit" class="form-control btn btn-secondary" href="{{ route('setor.index') }}"> Voltar </a>
                </div>

                <div class="col-md-1">
                    <button type="submit" class="form-control btn btn-success"> Atualizar </button>
                </div>
            </div>
        </form>
    </div>
@endsection
