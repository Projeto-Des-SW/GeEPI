@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center"> Editar Fiscal </h1>

        <form method="POST" action=" {{ route('fiscal.update') }}">
            @csrf

            <input type="hidden" name="fiscal_id" value="{{ $fiscal->id }}">

            <div class="row">
                <div class="col-md-4"> </div>

                <div class="col-md-4">
                    <label for="nome_fiscal"> Nome </label>
                    <input class="form-control" type="text" name="nome" id="nome_fiscal" value="{{ $fiscal->nome }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"> </div>

                <div class="col-md-4">
                    <label for="email_fiscal"> Email </label>
                    <input class="form-control" type="text" name="email" id="email_fiscal" value="{{ $fiscal->email }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"> </div>

                <div class="col-md-4">
                    <label for="cpf"> CPF </label>
                    <input class="form-control" type="text" name="cpf" id="cpf" value="{{ $fiscal->cpf}}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"> </div>

                <div class="col-md-4">
                    <label for="telefone"> Telefone </label>
                    <input class="form-control" type="text" name="contato" id="telefone" value="{{ $fiscal->contato}}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"> </div>

                <div class="col-md-4">
                    <label for="setor_fiscal"> Setor </label>
                    <select class="form-select" name="setor_id" id="setor_fiscal" required>
                        <option value="" selected hidden> {{$fiscal->setor->nome}} </option>
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
                    <a type="submit" class="form-control btn btn-secondary" href="{{ route('fiscal.index') }}"> Voltar </a>
                </div>

                <div class="col-md-1">
                    <button type="submit" class="form-control btn btn-success"> Atualizar </button>
                </div>
            </div>
        </form>
    </div>
@endsection
