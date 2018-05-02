@extends('layouts.frontend')

@section('title', "Producto")
@section('content')

@include('frontend.components.header')
<main class="main main-user">
    <section class="section-wrapper">
        <hgroup class="section-header">
            <span class="title">Producto</span>
        </hgroup>
        <article class="section-content">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <img class="card-img-top" src="http://via.placeholder.com/640x480" alt="Card image cap">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card-body">
                        <span class="badge badge-danger badge-large">180 puntos</span>
                        <h4 class="card-title">Nombre del Producto</h4>
                        <p class="card-text">La elegante Inissia de Nespresso, caracterizada por su diseño compacto, su tamaño reducido, su ligereza y su asa ergonómica, le hará la vida más fácil. Inissia está disponible en una amplia variedad de colores para
                            adaptarse a todos los gustos.</p>
                    </div>
                    <div class="card-body">
                        <button class="btn" type="button" data-toggle="modal" data-target="#modalCanje">Canjear</button>
                    </div>
                    <div class="card-body">
                        <h6>Legales</h6>
                        <p>
                            <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam efficitur sollicitudin aliquam. Aenean lectus tellus, condimentum nec dui quis, efficitur accumsan est. Suspendisse arcu arcu, venenatis eget luctus
                                et, sollicitudin quis nulla.</small>
                        </p>
                    </div>
                </div>
            </div>
        </article>
        <!-- Modal-->
        <div class="modal fade" id="modalCanje" tabindex="-1" role="dialog" aria-labelledby="modalCanjeLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title text-center">Confirmar Canje</div>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <p>Desea canjear
                            <br>
                            <span class="badge badge-danger">124 puntos</span> por
                            <br>
                            <strong>Nombre del producto</strong>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline" data-dismiss="modal">Cancelar</button>
                        <a class="btn" href="{{ url('/catalogo/success') }}">Confirmar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-footer text-right">
            <a href="{{ url('/catalogo') }}">Volver</a>
        </div>
    </section>
</main>
@endsection