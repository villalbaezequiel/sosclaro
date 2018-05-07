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
                        <img class="card-img-top" src="{{ asset(\App\Products::getUrlImage($product->id)) }}" alt="Card image cap">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card-body">
                        <span class="badge badge-danger badge-large">{{ $product->price }} puntos</span>
                        <h4 class="card-title">{{ $product->name }}</h4>
                        <p class="card-text">{{ $product->description }}</p>
                    </div>
                    <form class="card-body" action="{{ url('usuario/canjes').'/'.$exchange->id }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="id_exchange" value="{{ $exchange->id }}" />
                        <input class="btn" type="submit" value="CONFIRMAR RECEPCIÓN" />
                    </form>
                    <div class="card-body">
                        <h6>Legales</h6>
                        <p>
                            <small>{{ $product->politica_legal }}</small>
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