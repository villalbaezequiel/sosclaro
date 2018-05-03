@extends('layouts.frontend')

@section('title', "Mis Canjes")
@section('content')

@include('frontend.components.header')
<main class="main main-user">
    <section class="section-wrapper">
        <hgroup class="section-header">
            <span class="title">Mis canjes</span>
        </hgroup>
        <article class="section-content">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="http://via.placeholder.com/640x480" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Nombre del Producto</h5>
                            <h6 class="card-subtitle">
                                <span class="badge badge-danger">180 puntos</span>
                            </h6>
                        </div>
                        <div class="card-footer">
                            <i class="fa fa-truck"></i> Envío pendiente</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="http://via.placeholder.com/640x480" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Nombre del Producto</h5>
                            <h6 class="card-subtitle">
                                <span class="badge badge-danger">180 puntos</span>
                            </h6>
                        </div>
                        <div class="card-footer">
                            <a href="{{ url('/usuario/canjes/1') }}">
                                <i class="fa fa-square-o"></i> Confirmar recepción</a> (
                            <i class="fa fa-truck"></i> Envío realizado )</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="http://via.placeholder.com/640x480" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Nombre del Producto</h5>
                            <h6 class="card-subtitle">
                                <span class="badge badge-danger">180 puntos</span>
                            </h6>
                        </div>
                        <div class="card-footer">
                            <i class="fa fa-check-square"></i> Recepción confirmada</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="http://via.placeholder.com/640x480" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Nombre del Producto</h5>
                            <h6 class="card-subtitle">
                                <span class="badge badge-danger">180 puntos</span>
                            </h6>
                        </div>
                        <div class="card-footer">
                            <i class="fa fa-check-square"></i> Recepción confirmada</div>
                    </div>
                </div>
            </div>
        </article>
    </section>
</main>
@endsection