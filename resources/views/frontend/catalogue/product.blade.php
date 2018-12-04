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
                        <img class="card-img-top" src="{{ asset('storage/app/public/products/') }}/{{ $product->id.'/'.$product->image }}" alt="{{ $product->name }}">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card-body">
                        <span class="badge badge-danger badge-large">{{ $product->price }} puntos</span>
                        <h4 class="card-title">{{ $product->name }}</h4>
                        <p class="card-text">
                            {{ $product->description }}
                        </p>
                    </div>
                    
                    <div class="card-body">
                    @if(\App\Dni::getPuntos(Auth::user()->id) >= $product->price)
                      @if($product->stock == 0)
                        <i>Producto Sin Stock.</i>
                      @else
                        <button class="btn" type="button" data-toggle="modal" data-target="#{{ $product->id }}">Canjear</button>
                      @endif
                    @else
                      <i>No tienes puntos suficientes para canjear este Producto.</i>
                    @endif
                    </div>
                    
                    <div class="card-body">
                        <h6>Legales</h6>
                        <p>
                            <small>{{ $product->politica_legal }}</small>
                        </p>
                    </div>
                </div>
            </div>
        </article>
        <!-- Modal-->
        <div class="modal fade" id="{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="modalCanjeLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form action="{{ url('catalogo/producto') }}/{{ $product->id }}" method="POST" class="modal-content">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <div class="modal-title text-center">Confirmar Canje</div>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <p>Desea canjear
                            <br>
                            <span class="badge badge-danger">{{ $product->price }} puntos</span> por
                            <br>
                            <strong>{{ $product->name }}</strong>
                        </p>
                        
                        @if($product->voucher == 1)
                        <div class="form-group">
                            <label>ID MercadoLibre:</label>
                            <input type="text" class="form-control" name="voucher_product" required>
                        </div>
                        @endif
                    </div>
                    <div class="modal-footer">
                        
                        <input type="hidden" name="id_product" value="{{ $product->id }}">
                        <input type="hidden" name="product_puntos" value="{{ $product->price }}">
                        <input type="hidden" name="id_dni" value="{{ \App\Dni::getIdUser(Auth::user()->id) }}">
                        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                        
                        <button type="button" class="btn btn-outline" data-dismiss="modal">Cancelar</button>
                        <input class="btn" type="submit" value="Confirmar" />
                    </div>
                </form>
            </div>
        </div>
        <div class="section-footer text-right">
            <a href="{{ url('/catalogo') }}">Volver</a>
        </div>
    </section>
</main>
@endsection