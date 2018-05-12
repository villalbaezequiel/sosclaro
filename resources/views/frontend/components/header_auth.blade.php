<header class="header">
    <div class="container">
        <hgroup class="brand">
            <a class="brand-link" href="{{ url('/') }}">
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
                <ul class="nav-main" style="justify-content: flex-end;">
                    <li class="nav-item">
                        <a href="{{ url('/') }}">Qué es?</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/logros') }}">Logros</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/contactanos') }}">Contactanos</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/login') }}">Ingresar</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/registro') }}">Registrarse</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
