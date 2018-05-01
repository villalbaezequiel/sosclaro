<!DOCTYPE html>
<html class="no-js" lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Crear mi cuenta | SOS CLARO</title>
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
            <main class="main main-guest">
                <section class="section section-login">
                    <hgroup>
                        <h1>
                            <img src="/img/logo.png" alt="SOS CLARO">
                        </h1>
                    </hgroup>
                    <div class="content">
                        <form action="dashboard.html">
                            <h3 class="title text-center">Mi Cuenta</h3>
                            <div class="alert alert-danger" role="alert">Las contraseñas no coinciden.</div>
                            <div class="form-group has-error">
                                <label class="form-label" for="signup-code">Código ITEC</label>
                                <input class="form-control is-invalid" type="text" id="signup-code" placeholder="Código ITEC">
                                <div class="invalid-feedback">Código inexistente.</div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="signup-dni">DNI</label>
                                <input class="form-control" type="text" id="signup-dni" placeholder="DNI"> </div>
                            <div class="form-group">
                                <label class="form-label" for="signup-email">Email</label>
                                <input class="form-control" type="email" id="signup-email" placeholder="Email"> </div>
                            <div class="form-group">
                                <label class="form-label" for="signup-password">Contraseña</label>
                                <input class="form-control" type="password" id="signup-password" placeholder="Contraseña"> </div>
                            <div class="form-group">
                                <label class="form-label" for="signup-password2">Repetir Contraseña</label>
                                <input class="form-control" type="password" id="signup-password2" placeholder="Repetir Contraseña"> </div>
                            <div class="form-group">
                                <button class="btn btn-block">CREAR</button>
                            </div>
                        </form>
                    </div>
                    <div class="actions">
                        <a href="index.html">Volver</a>
                    </div>
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