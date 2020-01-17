@extends('layouts.frontend')

@section('title', "Canje")
@section('content')

@include('frontend.components.header')

        <div id="titular">
            <h1>¡FELICITACIONES!</h1>
        </div>
        <div class="container">

            <div class="row" style="margin-top:50px;">
                <div class="col-md-3">
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">¡Canjeaste una Fanbag Digital!</h2>
                            <h4 class="card-subtitle mb-2">Tu código de voucher es:</h4>
                        </div>
                        <img class="fanbag_box" src="{{ asset('assets/frontend/img/fanbag.png') }}" alt="fanbag_box">
                    </div>
                    <div class="voucher-container"><p>{{ app('request')->input('codigo') }}</p></div>
                    <br>
                    <br/>

                </div>
                <div class="col-md-3">
                </div>
            </div>

        </div>
        <div id="footer">
            <p>Entrá a: <a href="https://fanbag.com.ar/reserva" target="_blank"><strong>fanbag.com.ar/reserva</strong></a> e ingresá tu código. Elegí la experiencia y fechas que más te gusten.</p>
        </div>
        <div id="more_footer">
            <h1>¡Que lo disfrutes!</h1>
        </div>
@endsection

<style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');
    @font-face {
        font-family: 'Montserrat';
        font-weight: normal;
        font-style: normal;
    }

    @font-face {
        font-family: 'Montserrat';
        font-weight: normal;
        font-style: normal;
    }

    body{background-image:url("img/bg.png");
        background-repeat:repeat;
    }
    #titular{font-family: 'Montserrat'; color:#FFF; text-align:center; background-color:#000; padding:5px 0px; margin-top:5vh;}
    .voucher-container{
        position:relative;
        background-color:#FFF;
        padding:5px 5px;
        font-family: 'Montserrat';
        color:#000;
        font-size:24px;
        font-weight: bold;
        text-transform: uppercase;
        text-align:center;
        width:30%;
        min-width:250px;
        border-radius:15px !important;
        margin:-30px 0px 0px 40px;
        z-index:100;
    }
    .voucher-container p{margin:0px; padding:0px;}
    .card{background: rgb(142,32,25);
        background: linear-gradient(-145deg, rgba(142,32,25,1) 0%, rgba(219,32,25,1) 51%, rgba(142,32,25,1) 100%);
        border-radius:30px !important;
        border:none !important;
        z-index:0;
        padding:15px 10px;
        font-family: 'Montserrat';
        color:#FFF;
    }

    .card-subtitle{font-family: 'Montserrat';  font-size: 18px; color:#FFF !important;}
    .fanbag_box{position:absolute;
        width:350px;
        right:-100px;
        top:-30px;
    }
    .card-title{width:70%; padding-bottom:20px;}
    #footer{background-color:#de221b; width:100%; margin:0px; padding:15px;}
    #footer p{font-family: 'Montserrat'; color:#FFF !important; width:90%; max-width:600px; display:block; margin:0px auto;}
    #footer a{font-family: 'Montserrat'; color:#FFF; text-decoration: none;}
    #footer a:hover{color:#5E5E5E;}
    #more_footer{font-family: 'Montserrat'; text-align: center; color:#FFF;}
    @media only screen and (max-width: 600px) {
        .fanbag_box{display:none;}
        .card-title{width:90%;}
    }
</style>
