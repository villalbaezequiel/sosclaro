<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Administrador MejoresVendedores</title>
    <style>
      /* -------------------------------------
          GLOBAL RESETS
      ------------------------------------- */
      img {
        border: none;
        -ms-interpolation-mode: bicubic;
        max-width: 100%; }

      body {
        background-color: #f6f6f6;
        font-family: sans-serif;
        -webkit-font-smoothing: antialiased;
        font-size: 14px;
        line-height: 1.4;
        margin: 0;
        padding: 0;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%; }


      /* -------------------------------------
          BODY & CONTAINER
      ------------------------------------- */

      .body {
        background-color: #f6f6f6;
        width: 100%; }

      /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
      .container {
        display: block;
        Margin: 0 auto !important;
        /* makes it centered */
        max-width: 580px;
        padding: 10px;
        width: 580px; }

      /* This should also be a block element, so that it will fill 100% of the .container */
      .content {
        box-sizing: border-box;
        display: block;
        Margin: 0 auto;
        max-width: 580px;
        padding: 10px; }

      /* -------------------------------------
          HEADER, FOOTER, MAIN
      ------------------------------------- */
      .main {
        background: #ffffff;
        border-radius: 3px;
        width: 100%; }

      .wrapper {
        box-sizing: border-box;
        padding: 20px; }

      .content-block {
        padding-bottom: 10px;
        padding-top: 10px;
      }

      .footer {
        clear: both;
        Margin-top: 10px;
        text-align: center;
        width: 100%; }
        .footer td,
        .footer p,
        .footer span,
        .footer a {
          color: #999999;
          font-size: 12px;
          text-align: center; }

      /* -------------------------------------
          TYPOGRAPHY
      ------------------------------------- */
      h1,
      h2,
      h3,
      h4 {
        color: #000000;
        font-family: sans-serif;
        font-weight: 400;
        line-height: 1.4;
        margin: 0;
        Margin-bottom: 30px; }

      h1 {
        font-size: 35px;
        font-weight: 300;
        text-align: center;
        text-transform: capitalize; }

      p,
      ul,
      ol {
        font-family: sans-serif;
        font-size: 14px;
        font-weight: normal;
        margin: 0;
        Margin-bottom: 15px; }
        p li,
        ul li,
        ol li {
          list-style-position: inside;
          margin-left: 5px; }

      a {
        text-decoration: underline; }

      /* -------------------------------------
          BUTTONS
      ------------------------------------- */
      .btn {
        box-sizing: border-box;
        padding-bottom: 15px;
        width: auto;
        text-align: center;
        border: solid 1px #3498db;
        border-radius: 5px;
        cursor: pointer;
        display: inline-block;
        font-size: 14px;
        font-weight: bold;
        margin: 0;
        padding: 12px 25px;
        text-decoration: none;
        text-transform: capitalize;
      }

      .btn-primary {
        background-color: #3498db;
        color: #ffffff!important;
      }

      /* -------------------------------------
          OTHER STYLES THAT MIGHT BE USEFUL
      ------------------------------------- */
      .last {
        margin-bottom: 0; }

      .first {
        margin-top: 0; }

      .align-center {
        text-align: center; }

      .align-right {
        text-align: right; }

      .align-left {
        text-align: left; }

      .clear {
        clear: both; }

      .mt0 {
        margin-top: 0; }

      .mb0 {
        margin-bottom: 0; }

      .powered-by a {
        text-decoration: none; }

      hr {
        border: 0;
        border-bottom: 1px solid #f6f6f6;
        Margin: 20px 0; }

      /* -------------------------------------
          RESPONSIVE AND MOBILE FRIENDLY STYLES
      ------------------------------------- */
      @media only screen and (max-width: 620px) {
        .body h1 {
          font-size: 28px !important;
          margin-bottom: 10px !important; }
        .body p,
        .body ul,
        .body ol,
        .body td,
        .body span,
        .body a {
          font-size: 16px !important; }
        .body .wrapper,
        .body .article {
          padding: 10px !important; }
        .body .content {
          padding: 0 !important; }
        .body .container {
          padding: 0 !important;
          width: 100% !important; }
        .body .main {
          border-left-width: 0 !important;
          border-radius: 0 !important;
          border-right-width: 0 !important; }
        .body .btn {
          width: 100% !important; }
        .body .img-responsive {
          height: auto !important;
          max-width: 100% !important;
          width: auto !important; }}

      /* -------------------------------------
          PRESERVE THESE STYLES IN THE HEAD
      ------------------------------------- */
      @media all {
        .ExternalClass {
          width: 100%; }
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
          line-height: 100%; }
        .apple-link a {
          color: inherit !important;
          font-family: inherit !important;
          font-size: inherit !important;
          font-weight: inherit !important;
          line-height: inherit !important;
          text-decoration: none !important; }
        .btn-primary:hover {
          background-color: #34495e !important;
          border-color: #34495e !important; } }

      .mail > a{
        color: #3498db!important;
      }
    </style>
  </head>
  <body class="">
    <div class="body">
        <div class="container">
          <div class="content">

            <div class="main">
              <div class="wrapper">
                <div>
                  <p>Hola,</p>
                  <p>Has realizado un Nuevo Canje.</p>
                </div>
                <div>
                    <p><a class="btn btn-primary" href="{{ $url }}/usuario/canjes" target="_blank">Ver Mis Canjes</a></p>
                </div>
                <div>
                    <p><a class="btn btn-primary" href="{{ $url }}/catalogo/producto{{ $product->id }}">Producto:</a>
                      <ul>
                        <li>Codigo: {{ $product->codigo }}</li>
                        <li>Nombre: {{ $product->name }}</li>
                        <li>Stock Actual: {{ $product->stock }}</li>
                      </ul>
                    </p>
                </div>
              </div>
            </div>

            <div class="footer">
              <div class="content-block">
                <span class="apple-link">© Copyright 2018. Algunos derechos reservados. <a href="http://www.mejoresvendedores.com.ar/terminos">Bases y condiciones</a></span>
              </div>
              <div class="content-block powered-by">
                <span>Powered by <a href="https://www.linkedin.com/in/ezequiel-villalba-7b7933a4">Ezequiel Villalba</a></span> <br/>
                <span>Mail <a href="mailto:villalbaezequiel64@gmail.com">villalbaezequiel64@gmail.com</a></span> <br/>
                <span>Telephone +549 11 62322902</span>
              </div>
            </div>

          </div>
        </div>
    </div>
  </body>
</html>
