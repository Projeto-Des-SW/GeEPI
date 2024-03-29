<nav class="navbar navbar-expand-md" style="background-color: #1C3751">
    <div class="container w-100 d-flex align-items-center justify-content-around">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img class="logo" src="/images/layouts/logo_geepi.svg">
        </a>

        <div class="navbar-text">
            <h5 style="color: white"> Empresa: Granja Almeida LTDA</h5>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->



            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <ul class="navbar-brand">
                            <ul id="menu_normal" class="navbar-nav h-100">
                                <li><a class="nav-link" href="/login" style="color: white;">Início</a></li>
                                <li><a class="nav-link" href="/sobre" style="color: white;">Sobre</a></li>
                            </ul>
                        </ul>
                    @endif



                {{-- @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                --}}
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Olá, {{ Auth::user()->nome }}
                    </a>

                    <div style="background: #FAB84B" class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href=" {{ route('usuario.editar_perfil') }} ">
                            Editar Perfil
                        </a>

                        <a class="dropdown-item" href=" {{ route('usuario.alterar_senha') }} ">
                            Alterar Senha
                        </a>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Sair
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
