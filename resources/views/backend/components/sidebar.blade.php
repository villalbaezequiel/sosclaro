<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{ url('/') }}">SosClaro</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" style="overflow: auto;">
            
            <li class="nav-item" data-toggle="tooltip" data-placement="right">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#nav_products">
                    <i class="fa fa-fw fa-cogs"></i>
                    <span class="nav-link-text">Productos</span>
                </a>
                <ul class="sidenav-second-level collapse" id="nav_products">
                    <li>
                        <a href="{{ url('/admin/categories') }}">Categorias</a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/products') }}">Productos</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right">
                <a class="nav-link" href="{{ url('/admin/exchanges') }}">
                    <i class="fa fa-fw fa-cogs"></i>
                    <span class="nav-link-text">Canjes</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#nav_tips">
                    <i class="fa fa-fw fa-cogs"></i>
                    <span class="nav-link-text">Consejos</span>
                </a>
                <ul class="sidenav-second-level collapse" id="nav_tips">
                    <li>
                        <a href="{{ url('/admin/tips/categories') }}">Categorias</a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/tips') }}">Consejos</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#nav_guests">
                    <i class="fa fa-fw fa-cogs"></i>
                    <span class="nav-link-text">Encuestas</span>
                </a>
                <ul class="sidenav-second-level collapse" id="nav_guests">
                    <li>
                        <a href="{{ url('/admin/guests') }}">Encuestas</a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/guests/questions') }}">Preguntas de Encuestas</a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/guests/users') }}">Completas por Usuarios</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right">
                <a class="nav-link" href="{{ url('/admin/regions') }}">
                    <i class="fa fa-fw fa-cogs"></i>
                    <span class="nav-link-text">Regiones</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right">
                <a class="nav-link" href="{{ url('/admin/locations') }}">
                    <i class="fa fa-fw fa-cogs"></i>
                    <span class="nav-link-text">Ubicaciones</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#nav_users">
                    <i class="fa fa-fw fa-users"></i>
                    <span class="nav-link-text">Usuarios</span>
                </a>
                <ul class="sidenav-second-level collapse" id="nav_users">
                    <li>
                        <a href="{{ url('/admin/dni') }}">DNI</a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/users') }}">Usuarios</a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/roles') }}">Roles</a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/indicadores') }}">Indicadores</a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/desempeno') }}">Desempeño</a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/users') }}">Historial Usuarios</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right">
                <a class="nav-link" href="{{ url('/admin/modals') }}">
                    <i class="fa fa-fw fa-cogs"></i>
                    <span class="nav-link-text">Modals</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#nav_settings">
                    <i class="fa fa-fw fa-cogs"></i>
                    <span class="nav-link-text">Configuracion</span>
                </a>
                <ul class="sidenav-second-level collapse" id="nav_settings">
                    <li>
                        <a href="{{ url('/admin/settings/social_networks') }}">Redes Sociales</a>
                    </li>
<!--                    <li>
                        <a href="{{ url('/admin/settings/emails') }}">Email</a>
                    </li>-->
                    <li>
                        <a href="{{ url('/admin/settings/politics_privacy') }}">Politica y Privacidad</a>
                    </li>
<!--                    <li>
                        <a href="{{ url('/admin/settings/legal_products') }}">Legales de Productos</a>
                    </li>
                    <li>
                        <a href="cards.html">Modals</a>
                    </li>-->
                </ul>
            </li>
        </ul>

        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="{{ url('/logout') }}" class="nav-link">
                    <i class="fa fa-fw fa-sign-out"></i>Cerrar Seción
                </a>
            </li>
        </ul>
    </div>
  </nav>