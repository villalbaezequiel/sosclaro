<header class="header">
    <div class="container">
        <hgroup class="brand">
            <a class="brand-link" href="{{ url('/dashboard') }}">
                <img class="brand-logo" src="{{ asset('assets/frontend/img/logo-black.png') }}" alt="SOS CLARO">
            </a>
        </hgroup>
        <nav class="nav" role="navigation">
            <div class="nav-toggle">
                <a href="#">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </a>
            </div>
            <div class="nav-menu">
                <ul class="nav-main">
                    <li class="nav-item">
                        <a href="{{ url('/catalogo') }}">Catálogo</a>
                    </li>
                    <li class="nav-item">
                        <a href="desempeno.html">Desempeño</a>
                    </li>
                    <li class="nav-item">
                        <a href="ranking.html">Ranking</a>
                    </li>
                    <li class="nav-item">
                        <a href="consejos.html">Consejos</a>
                    </li>
                    <li class="nav-item">
                        <a href="encuestas.html">Encuestas</a>
                    </li>
                </ul>
                <ul class="nav-social">
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="btn btn-black dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lucas</button>
                            <span class="badge badge-danger">120 puntos</span>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ url('/usuario/canjes') }}">Mis canjes</a>
                                <a class="dropdown-item" href="{{ url('/usuario/historial') }}">Historial de cuenta</a>
                                <a class="dropdown-item" href="{{ url('/usuario/mi-cuenta') }}">Mi cuenta</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ url('/auth/logout') }}">Salir</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>