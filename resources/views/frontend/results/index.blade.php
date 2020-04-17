@extends('layouts.frontend')

@section('title', "Resultados")
@section('content')

@include('frontend.components.header')

<main class="main main-user">
    <section class="section section-dashboard">
        <div class="slider slider-single">
            @foreach($modals as $modal)
              @if($modal->section == 666)
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
    
    <section class="section section-results btn-black">
      <div class="col-md-12">
        <div class="text-center">Categorias</div>
      </div>
    </section>
    
    <section class="section">
      <div class="row">
        @foreach($results_categories as $category)
            <div class="col-sm-6 col-xl-3 mb-md-0" style="margin: 0 auto;">
              <a href="{{ url('/resultados/'.$category->id) }}" class="card card-results" style="text-decoration: none;">
                <img class="card-img-top card-img-top-results" src="{{ asset('storage/app/public/results_categories/') }}/{{ $category->id.'/'.$category->image }}">
                <div class="card-body card-body-results btn-black text-center">
                  <?php $name_category = explode(" ", $category->name); ?>
                  <span>{{ $name_category[0] }}</span>
                  <p class="h4">{{ $name_category[1] }}</p>
                </div>
              </a>
            </div>
        @endforeach
      </div>
    </section>
    
    <section class="section section-results btn-black">
      <div class="col-md-12">
        <div class="text-center">Bonus Track</div>
      </div>
    </section>
    
    <section class="section">
      <div class="row">
        @foreach($bonus_track_categories as $category)
            <div class="col-sm-6 col-xl-3 mb-md-0" style="margin: 0 auto;">
              <a href="{{ url('/bonus-track/'.$category->id) }}" class="card card-results" style="text-decoration: none;">
                <img class="card-img-top card-img-top-results" src="{{ asset('storage/app/public/bonus_track_categories/') }}/{{ $category->id.'/'.$category->image }}">
                <div class="card-body card-body-results btn-black text-center">
                  <?php $name_category = explode(" ", $category->name); ?>
                  @if(isset($name_category[0]))
                    <span>{{ $name_category[0] }}</span>
                  @endif
                  @if(isset($name_category[1]))
                  <p class="h4">{{ $name_category[1] }}</p>
                  @endif
                </div>
              </a>
            </div>
        @endforeach
      </div>
    </section>
</main>
@endsection