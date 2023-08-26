@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center"> Alterar Senha </h1>

        <form method="POST" action=" {{ route('usuario.senha_update') }}">
            @csrf

            <div class="row">
                <div class="col-md-4"> </div>

                <div class="col-md-4">
                    <label for="senha_atual"> Senha Atual </label>
                    <input class="form-control" type="password" name="current_password" id="senha_atual" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"> </div>

                <div class="col-md-4">
                    <label for="nova_senha"> Nova Senha </label>
                    <input class="form-control" type="password" name="password" id="nova_senha" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"> </div>

                <div class="col-md-4">
                    <label for="senha_confirmacao"> Confirmar Senha </label>
                    <input class="form-control" type="password" name="password_confirmation" id="senha_confirmacao" required>
                </div>
            </div>


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
