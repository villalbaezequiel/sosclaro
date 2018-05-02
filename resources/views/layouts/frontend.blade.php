<!DOCTYPE html>
<html class="no-js" lang="es">

<head>
    <title>@yield('title') | SOS CLARO</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SosClaro Backend">
    <meta name="author" content="Ezequiel Villalba">
    <meta name="robots" content="index, follow">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/frontend/css/font-awesome.css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/plugins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/main.min.css') }}">
    <script src="{{ asset('assets/frontend/js/vendor/modernizr-min.js') }}"></script>

    @yield('css')
</head>
<body>
    
    <div class="page">  
        @yield('content')
        @include('frontend.components.footer')
    </div>
    
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="frontend/js/vendor/jquery-min.js"><\/script>');
    </script>
    <script src="{{ asset('assets/frontend/js/vendor/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/popper-min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/app.min.js') }}"></script>
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
    @yield('javascript')
</body>
</html>