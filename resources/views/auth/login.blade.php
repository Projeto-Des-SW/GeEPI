@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="/css/home/homepage.css">
@endsection

@section('content')



    <section class="container d-flex justify-content-center align-items-center home-page-container">


        <img src="/images/home/boneco.svg" style="width: 20%">

        <section class="box-conteudo d-flex flex-column align-items-center justify-content-start">
            <h1 class="w-100 text-center mb-3" style="color: #1C3751">Otimize a segurança e
                simplifique a gestão de EPIs,
                use o GeEPI na sua empresa</h1>

            <a class="button" href="https://www.youtube.com/shorts/72CLsxfWZsY" target="_blank" style="background-color: #ffffff; color: #1C3751; border: 2px solid #1C3751; padding: 10px 20px; border-radius: 50px; text-decoration: none;">{{ __('Assista nosso vídeo de Demonstração') }}</a>

        </section>

        <form class="form-homepage" method="POST" action="{{route('login') }}">
            @csrf
            <h4 class="text-center mb-5">Entrar</h4>

            <input
                class="input-home-form"
                type="email"
                name="email"
                placeholder="Insira seu e-mail"
                autofocus
                id="">

            <input
                class="input-home-form"
                type="password"
                name="password"
                placeholder="Digite sua senha"
                autofocus
                id="">

            <div>
                <button class="button-homepage" type="submit">Entrar</button>
            </div>

            <div class="container-text-homeform">
                <a class="esqueceu-senha-link" href="{{ route('password.request') }}">
                    <p class="text-end text-homepage mt-2">Esqueceu sua senha?</p>
                </a>
            </div>

        </form>
    </section>
    </html>



@endsection


