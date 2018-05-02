@extends('layouts.frontend')

@section('title', "Dashboard")
@section('content')

@include('frontend.components.header')
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
@endsection