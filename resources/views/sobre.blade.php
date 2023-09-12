@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="/css/home/contato.css">
@endsection

@section('content')
    <section class="container section-geral">
        <section class="section-view">
            <div class="card">
                <div class="card-body">
                    <h1 class="titulo-view">Sobre o sistema</h1>

                    <div class="text-justify">
                        <h2>Apresentação:</h2>
                        <p>

                            Apresentamos o GeEPI, um sistema inovador desenvolvido
                            para aprimorar o gerenciamento de Equipamentos de Proteção
                            Individual (EPIs) em sua empresa. Com o GeEPI, você poderá
                            otimizar a segurança da sua equipe, reduzir custos
                            desnecessários e simplificar o processo de gestão de EPIs.
                            Sendo possível realizar pedidos de EPIs diretamente pelo
                            sistema, proporcionando maior praticidade e eficiência.
                        </p>

                        <h2>Objetivo:</h2>

                            <p> O sistema deve possuir 2 tipos de usuários, são eles, Administrador e fiscal.
                                O Administrador deve ser capaz de cadastrar, editar e remover fiscais, aprovar e reprovar solicitações de material, além de criar,editar e remover novas solicitações, adicionar, editar e remover epi's, gerenciar o estoque.
                                O Fiscal deve ser capaz de criar, editar e remover solicitações, consultar seu histórico e verificar o status das solicitações já feitas.
                            </p>

                        <h2>Código-fonte:</h2>
                        <p><a href="https://github.com/Projeto-Des-SW/GeEPI" target="_blank">GitHub</a></p>



                            <h2>Docente:</h2>
                            <ul>Dr. Rodrigo Gusmão de Carvalho Rocha</ul>


                            <h2>Desenvolvedores:</h2>
                            <ul>Douglas Filipe Severo Batista</ul>
                            <ul>João Victor Cordeiro da SIlva</ul>
                            <ul>Luiz Gustavo Martins Leite</ul>

                    </div>

                </div>
            </div>
        </section>
    </section>
@endsection
