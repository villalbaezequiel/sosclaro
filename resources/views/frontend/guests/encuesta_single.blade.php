<!DOCTYPE html>
<html class="no-js" lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Encuesta | SOS CLARO</title>
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
                <div class="alert alert-info">Sabías que completando esta encuesta obtenés
                    <strong>5 puntos</strong> de regalo?</div>
                <section class="section-wrapper">
                    <hgroup class="section-header">
                        <span class="title">Encuesta</span>
                    </hgroup>
                    <article class="section-content">
                        <div class="article">
                            <div class="article-header">
                                <h3>Titulo de la encuesta</h3>
                            </div>
                            <div class="article-body">
                                <form class="encuesta was-validated">
                                    <div class="form-group">
                                        <label for="encuestaPregunta1">Pregunta para responder con un email</label>
                                        <input type="email" class="form-control" id="encuestaPregunta1" placeholder="nombre@dominio.com" required>
                                        <div class="invalid-feedback">Tienes que contestar esta pregunta.</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="encuestaPregunta2">Pregunta para responder con un select</label>
                                        <select class="form-control" id="encuestaPregunta2">
                                            <option>Opción 1</option>
                                            <option>Opción 2</option>
                                            <option>Opción 3</option>
                                            <option>Opción 4</option>
                                            <option>Opción 5</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="encuestaPregunta3">Pregunta para responder con un multiple select</label>
                                        <select multiple class="form-control" id="encuestaPregunta3">
                                            <option>Opción 1</option>
                                            <option>Opción 2</option>
                                            <option>Opción 3</option>
                                            <option>Opción 4</option>
                                            <option>Opción 5</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="encuestaPregunta4">Pregunta para responder con un textarea</label>
                                        <textarea class="form-control" id="encuestaPregunta4" rows="3" required></textarea>
                                        <div class="invalid-feedback">Tienes que contestar esta pregunta.</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="encuestaPreguntaRadios">Pregunta para responder con radios</label>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" name="encuestaPreguntaRadios" id="encuestaPreguntaRadios1" value="option1" checked>
                                            <label class="custom-control-label" for="encuestaPreguntaRadios1">Opción 1</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" name="encuestaPreguntaRadios" id="encuestaPreguntaRadios2" value="option2">
                                            <label class="custom-control-label" for="encuestaPreguntaRadios2">Opción 2</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" name="encuestaPreguntaRadios" id="encuestaPreguntaRadios3" value="option3">
                                            <label class="custom-control-label" for="encuestaPreguntaRadios3">Opción 3</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="encuestaPreguntaRadios">Pregunta para responder con checkbox</label>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" name="encuestaPreguntaChecks" id="encuestaPreguntaChecks1" value="option1" checked>
                                            <label class="custom-control-label" for="encuestaPreguntaChecks1">Opción 1</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" name="encuestaPreguntaChecks" id="encuestaPreguntaChecks2" value="option2">
                                            <label class="custom-control-label" for="encuestaPreguntaChecks2">Opción 2</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" name="encuestaPreguntaChecks" id="encuestaPreguntaChecks3" value="option3">
                                            <label class="custom-control-label" for="encuestaPreguntaChecks3">Opción 3</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block">Enviar</button>
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