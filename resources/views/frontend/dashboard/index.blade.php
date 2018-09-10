@extends('layouts.frontend')

@section('title', "Inicio")
@section('content')

@include('frontend.components.header')
<main class="main main-user">
    
    @if(\App\UsersProfile::getStatus(Auth::user()->id) == 0)
    <div class="alert alert-info">
        <strong>Bienvenido</strong>. Sabías que completando tu perfil obtenés
        <strong>20 puntos</strong> de regalo?
        <a href="{{ url('/usuario/mi-cuenta') }}">Completar</a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    
    
    <section class="section section-dashboard">
        <div class="slider slider-single">
            @foreach($modals as $modal)
              @if($modal->section == 999)
                <div class="slider-item">
                    <a href="{{ $modal->url }}" target="_blank">
                        <img class="visible-md-up" src="{{ asset('storage/app/public/modals/desktop/') }}/{{ $modal->id.'/'.$modal->image_desktop }}">
                        <img class="visible-xs visible-sm" src="{{ asset('storage/app/public/modals/mobile/') }}/{{ $modal->id.'/'.$modal->image_mobile }}">
                    </a>
                </div>
              @endif
            @endforeach
        </div>
    </section>
    
</main>
@endsection
@section('javascript')
<script type="text/javascript">
$(document).ready(function(){
    $('.slider-single').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: true,
      dots: true,
      fade: false,
      adaptiveHeight: true,
      prevArrow:
        '<button type="button" class="slick-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>',
      nextArrow:
        '<button type="button" class="slick-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>'
    }); 
});
</script>
@endsection