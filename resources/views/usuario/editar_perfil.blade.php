@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center"> Editar Perfil </h1>

        <form method="POST" action=" {{ route('usuario.update') }}">
            @csrf

            <div class="row">
                <div class="col-md-4"> </div>

                <div class="col-md-4">
                    <label for="nome_fiscal"> Nome </label>
                    <input class="form-control" type="text" name="nome" id="nome_fiscal" value="{{ $usuario->nome }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"> </div>

                <div class="col-md-4">
                    <label for="email_fiscal"> Email </label>
                    <input class="form-control" type="text" name="email" id="email_fiscal" value="{{ $usuario->email }}" required>
                </div>
            </div>

            @if(Auth::user()->tipo_usuario_id == 2)
                <div class="row">
                    <div class="col-md-4"> </div>

                    <div class="col-md-4">
                        <label for="cpf"> CPF </label>
                        <input class="form-control" type="text" name="cpf" id="cpf" value="{{ $usuario->cpf }}" required>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col-md-4"> </div>

                <div class="col-md-4">
                    <label for="telefone"> Telefone </label>
                    <input class="form-control" type="text" name="contato" id="telefone" value="{{ $usuario->contato }}" required>
                </div>
            </div>

            @if(Auth::user()->tipo_usuario_id == 2)
                <div class="row">
                    <div class="col-md-4"> </div>

                    <div class="col-md-4">
                        <label for="setor_fiscal"> Setor </label>
                        <input class="form-control" type="text" value="{{ $usuario->setor->nome }}" disabled>
                    </div>
                </div>
            @endif

            </br>

            <div class="row">
                <div class="col-md-5"> </div>

                <div class="col-md-1">
                    <a type="submit" class="form-control btn btn-secondary" href="{{ route('home') }}"> Voltar </a>
                </div>

                <div class="col-md-1">
                    <button type="submit" class="form-control btn btn-success"> Atualizar </button>
                </div>
            </div>

        </form>
    </div>

@endsection
