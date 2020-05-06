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

            @if(count($errors) > 0)
                <div class="alert alert-danger" role="alert">{{ $errors->first() }}</div>
            @endif

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
                            {!! $product->description !!}
                        </p>
                    </div>

                    <div class="card-body">

                    @if(\App\Exchanges::getCountPendientes(Auth::user()->id) >= 2)
                        <h5>Te recordamos que debes cambiar el estado del envio una vez que lo recibas para poder seguir canjeando.</h5>
                            <p><a class="btn btn-primary" href="/usuario/canjes">Ver Mis Canjes</a></p>
                            @elseif(\App\Dni::getPuntos(Auth::user()->id) >= $product->price)
                      @if($product->stock <= 0)
                        <i>Producto Sin Stock.</i>
                      @else
                        <button class="btn" type="button" data-toggle="modal" data-target="#{{ $product->id }}">Canjear</button>
                      @endif
                    @elseif (\App\Dni::getPuntos(Auth::user()->id) < $product->price)
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
                <form action="{{ url('catalogo/producto') }}/{{ $product->id }}" method="POST" class="modal-content" id="change-product-catalogo">
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
                            @if(strpos($product->name, 'Netshoes') !== false)
                                <label>Email de su Cuenta de Netshoes</label>
                                <input type="text" class="form-control" name="voucher_product" required>
                            @endif
                        </div>
                          <input type="hidden" name="is_voucher" value="1">
                        @elseif($product->is_fanbag == 1)
                            <label>Ingrese su email:</label>
                            <input type="text" class="form-control" id="email_fanbag" name="email_fanbag" required>
                            <label>Repita su email:</label>
                            <input type="text" class="form-control" id="email_fanbag_repeat" name="email_fanbag_repeat" required>
                        @endif
                    </div>
                    <div class="modal-footer">

                        <input type="hidden" name="id_product" value="{{ $product->id }}">
                        <input type="hidden" name="product_puntos" value="{{ $product->price }}">
                        <input type="hidden" name="id_dni" value="{{ \App\Dni::getIdUser(Auth::user()->id) }}">
                        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">

                        <input type="hidden" name="nickname_ml" value="">
                        <input type="hidden" name="id_ml" value="">
                        <input type="hidden" name="profile_ml" value="">
                        <input type="hidden" name="email_ml" value="">

                        <button type="button" class="btn btn-outline" data-dismiss="modal">Cancelar</button>
                        @if(strpos($product->name, 'Netshoes') !== false)
                            <input class="btn" id="btnSubmit" type="submit" value="Confirmar" />
                        @elseif($product->is_fanbag == 1)
                            <input type="hidden" name="is_fanbag" value="{{ $product->is_fanbag }}">
                            <input class="btn" id="btnSubmit" type="submit" value="Confirmar" />
                        @else
                            <button class="btn" id="connect-ml" >Conectar con Mercado Libre</button>
                        @endif

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

@section('javascript')
<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
<script src="https://static.mlstatic.com/org-img/sdk/mercadolibre-1.0.4.js"></script>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/api_ml.js') }}"></script>

<script>
    function setDisabled(row)
    {
        //$(row).prop('disabled', true);
    }
</script>

@endsection
