@extends('layouts.frontend')

@section('title', "Canje")
@section('content')

@include('frontend.components.header')
<main class="main main-user">
    <section class="section-wrapper">
        <hgroup class="section-header">
            <span class="title">Canje</span>
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
                        <a class="btn" href="">CONFIRMAR RECEPCIÓN</a>
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
            <div class="card-body">
                <h5>No lo recibiste?</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam efficitur sollicitudin aliquam. Aenean lectus tellus, condimentum nec dui quis, efficitur accumsan est. Suspendisse arcu arcu, venenatis eget luctus et, sollicitudin
                    quis nulla. Vivamus a molestie mauris, eu condimentum nisi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus scelerisque porttitor eros, ac imperdiet odio tincidunt eget.</p>
            </div>
        </article>
        <div class="section-footer text-right">
            <a href="{{ url('/usuario/canjes') }}">Volver</a>
        </div>
    </section>
</main>
@endsection