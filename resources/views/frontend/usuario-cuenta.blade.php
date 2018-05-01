<!DOCTYPE html>
<html class="no-js" lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mi cuenta | SOS CLARO</title>
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
                <div class="alert alert-info">Sabías que completando tu perfil tenes
                    <strong>20 puntos</strong> de regalo?</div>
                <section class="section-wrapper">
                    <hgroup class="section-header">
                        <span class="title">Mi cuenta</span>
                    </hgroup>
                    <article class="section-content">
                        <div class="article">
                            <div class="article-body">
                                <form>
                                    <div class="form-group row">
                                        <label class="col col-sm-3 col-form-label" for="user1">Código ITEC</label>
                                        <div class="col col-sm-9">
                                            <input type="text" class="form-control" id="user1" placeholder="12378128397" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col col-sm-3 col-form-label" for="user1">Nombre</label>
                                        <div class="col col-sm-9">
                                            <input type="text" class="form-control" id="user1" value="Lucas Rene" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col col-sm-3 col-form-label" for="user1">Apellido</label>
                                        <div class="col col-sm-9">
                                            <input type="text" class="form-control" id="user1" value="Marozzi" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col col-sm-3 col-form-label" for="user1">DNI</label>
                                        <div class="col col-sm-9">
                                            <input type="number" class="form-control" id="user1" value="29123876" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col col-sm-3 col-form-label" for="user1">Email</label>
                                        <div class="col col-sm-9">
                                            <input type="email" class="form-control" id="user1" value="lucar.marozzi@claro.com.ar" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col col-sm-3 col-form-label" for="user1">Sexo</label>
                                        <div class="col col-sm-9">
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" name="encuestaPreguntaRadios" id="encuestaPreguntaRadios1" value="option1" checked>
                                                <label class="custom-control-label" for="encuestaPreguntaRadios1">Masculino</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" name="encuestaPreguntaRadios" id="encuestaPreguntaRadios2" value="option2">
                                                <label class="custom-control-label" for="encuestaPreguntaRadios2">Femenino</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col col-sm-3 col-form-label" for="user1">Nacimiento</label>
                                        <div class="col col-sm-3">
                                            <input type="number" class="form-control" id="user1" placeholder="DD" required>
                                        </div>
                                        <div class="col col-sm-3">
                                            <input type="number" class="form-control" id="user1" placeholder="MM" required>
                                        </div>
                                        <div class="col col-sm-3">
                                            <input type="number" class="form-control" id="user1" placeholder="YYYY" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col col-sm-3 col-form-label" for="user1">Teléfono</label>
                                        <div class="col col-sm-9">
                                            <input type="text" class="form-control" id="user1" placeholder="+5491159998888" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col col-sm-3 col-form-label" for="user1">Región</label>
                                        <div class="col col-sm-9">
                                            <select class="form-control" id="encuestaPregunta2">
                                                <option>Opción 1</option>
                                                <option>Opción 2</option>
                                                <option selected>Patagónia</option>
                                                <option>Opción 4</option>
                                                <option>Opción 5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-block" type="submit">Guardar</button>
                                    </div>
                                </form>
                            </div>
                            <div class="article-footer">
                                <p>
                                    <a href="encuestas.html">Volver</a>
                                </p>
                            </div>
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