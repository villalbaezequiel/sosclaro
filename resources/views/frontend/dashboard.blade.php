<!DOCTYPE html>
<html class="no-js" lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard | SOS CLARO</title>
        <meta name="description" content="#{description}">
        <meta name="keywords" content="#{keywords}">
        <meta name="author" content="#{author}">
        <meta name="robots" content="index, follow">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="css/plugins.min.css">
        <link rel="stylesheet" href="css/main.min.css">
        <script src="js/vendor/modernizr-min.js"></script>
    </head>
    <body>
        <div class="page">
            <header class="header">
                <div class="container">
                    <hgroup class="brand">
                        <a class="brand-link" href="dashboard.html">
                            <img class="brand-logo" src="img/logo-black.png" alt="SOS CLARO">
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
                                    <a href="catalogo.html">Catálogo</a>
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
                                            <a class="dropdown-item" href="usuario-canjes.html">Mis canjes</a>
                                            <a class="dropdown-item" href="usuario-historial.html">Historial de cuenta</a>
                                            <a class="dropdown-item" href="usuario-cuenta.html">Mi cuenta</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="index.html">Salir</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </header>
            <main class="main main-user">
                <div class="alert alert-info">
                    <strong>Bienvenido</strong>. Sabías que completando tu perfil obtenés
                    <strong>20 puntos</strong> de regalo?
                    <a href="#">Completar</a>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <section class="section section-dashboard">
                    <div class="slider slider-single">
                        <div class="slider-item">
                            <a href="https://claro.com.ar">
                                <img class="visible-md-up" src="http://via.placeholder.com/1280x320">
                                <img class="visible-xs visible-sm" src="http://via.placeholder.com/640x320">
                            </a>
                        </div>
                        <div class="slider-item">
                            <a href="https://claro.com.ar">
                                <img class="visible-md-up" src="http://via.placeholder.com/1280x320">
                                <img class="visible-xs visible-sm" src="http://via.placeholder.com/640x320">
                            </a>
                        </div>
                        <div class="slider-item">
                            <a href="https://claro.com.ar">
                                <img class="visible-md-up" src="http://via.placeholder.com/1280x320">
                                <img class="visible-xs visible-sm" src="http://via.placeholder.com/640x320">
                            </a>
                        </div>
                    </div>
                </section>
                <section class="section-wrapper">
                    <hgroup class="section-header">
                        <span class="title">Catálogo</span>
                        <aside>
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-sliders"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <h6 class="dropdown-header">Ordenar</h6>
                                <a id="sortPuntosAsc" class="dropdown-item" href="#">Mayor a menor</a>
                                <a id="sortPuntosDesc" class="dropdown-item" href="#">Menor a mayor</a>
                                <a id="sortNombre" class="dropdown-item" href="#">Alfabéticamente</a>
                                <div class="dropdown-divider"></div>
                                <div class="dropdown-item">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="filterPuntos">
                                        <label class="form-check-label" for="filterPuntos">Sólo para mis puntos</label>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </hgroup>
                    <article class="section-content" id="catalogo">
                        <div class="producto">
                            <a class="card" href="catalogo-producto.html">
                                <img class="card-img-top" src="http://via.placeholder.com/640x480" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Nombre del Producto</h5>
                                    <h6 class="card-subtitle">
                                        <span class="badge badge-danger">
                                            <span class="puntos">210</puntos> puntos</span>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div class="producto">
                            <a class="card" href="catalogo-producto.html">
                                <img class="card-img-top" src="http://via.placeholder.com/640x480" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Cafetera</h5>
                                    <h6 class="card-subtitle">
                                        <span class="badge badge-danger">
                                            <span class="puntos">205</puntos> puntos</span>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div class="producto">
                            <a class="card" href="catalogo-producto.html">
                                <img class="card-img-top" src="http://via.placeholder.com/640x480" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Set matero</h5>
                                    <h6 class="card-subtitle">
                                        <span class="badge badge-danger">
                                            <span class="puntos">180</puntos> puntos</span>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div class="producto">
                            <a class="card" href="catalogo-producto.html">
                                <img class="card-img-top" src="http://via.placeholder.com/640x480" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Entradas a la final del mundial</h5>
                                    <h6 class="card-subtitle">
                                        <span class="badge badge-danger">
                                            <span class="puntos">170</puntos> puntos</span>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div class="producto">
                            <a class="card" href="catalogo-producto.html">
                                <img class="card-img-top" src="http://via.placeholder.com/640x480" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Reloj de pared</h5>
                                    <h6 class="card-subtitle">
                                        <span class="badge badge-danger">
                                            <span class="puntos">155</puntos> puntos</span>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div class="producto">
                            <a class="card" href="catalogo-producto.html">
                                <img class="card-img-top" src="http://via.placeholder.com/640x480" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Show de Abel Pintos</h5>
                                    <h6 class="card-subtitle">
                                        <span class="badge badge-danger">
                                            <span class="puntos">130</puntos> puntos</span>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div class="producto disponible">
                            <a class="card" href="catalogo-producto.html">
                                <img class="card-img-top" src="http://via.placeholder.com/640x480" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Samsung S7 (caja)</h5>
                                    <h6 class="card-subtitle">
                                        <span class="badge badge-danger">
                                            <span class="puntos">110</puntos> puntos</span>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div class="producto disponible">
                            <a class="card" href="catalogo-producto.html">
                                <img class="card-img-top" src="http://via.placeholder.com/640x480" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">iPhone 10 (caja)</h5>
                                    <h6 class="card-subtitle">
                                        <span class="badge badge-danger">
                                            <span class="puntos">90</puntos> puntos</span>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div class="producto disponible">
                            <a class="card" href="catalogo-producto.html">
                                <img class="card-img-top" src="http://via.placeholder.com/640x480" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Gorra</h5>
                                    <h6 class="card-subtitle">
                                        <span class="badge badge-danger">
                                            <span class="puntos">80</puntos> puntos</span>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div class="producto disponible">
                            <a class="card" href="catalogo-producto.html">
                                <img class="card-img-top" src="http://via.placeholder.com/640x480" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Pelota de fútbol</h5>
                                    <h6 class="card-subtitle">
                                        <span class="badge badge-danger">
                                            <span class="puntos">75</puntos> puntos</span>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div class="producto disponible">
                            <a class="card" href="catalogo-producto.html">
                                <img class="card-img-top" src="http://via.placeholder.com/640x480" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Parasol</h5>
                                    <h6 class="card-subtitle">
                                        <span class="badge badge-danger">
                                            <span class="puntos">70</puntos> puntos</span>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div class="producto disponible">
                            <a class="card" href="catalogo-producto.html">
                                <img class="card-img-top" src="http://via.placeholder.com/640x480" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Paragua</h5>
                                    <h6 class="card-subtitle">
                                        <span class="badge badge-danger">
                                            <span class="puntos">65</puntos> puntos</span>
                                    </h6>
                                </div>
                            </a>
                        </div>
                    </article>
                </section>
            </main>
            <footer class="footer">
                <div class="container">
                    <p>
                        <small>&copy; Copyright 2018. Algunos derechos reservados.</small>
                    </p>
                </div>
            </footer>
        </div>
        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script>
            window.jQuery || document.write('<script src="js/vendor/jquery-min.js"><\/script>');
        </script>
        <script src="js/vendor/isotope.pkgd.min.js"></script>
        <script src="js/vendor/popper-min.js"></script>
        <script src="js/plugins.min.js"></script>
        <script src="js/app.min.js"></script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(i, s, o, g, r, a, m)
            {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function()
                {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-11111111-1', 'yourdomain.com');
            ga('send', 'pageview');
        </script>
    </body>
</html>