@extends('layouts.frontend')

@section('title', "Novedad")
@section('content')

@include('frontend.components.header')
<main class="main main-user">
    <section class="section-wrapper">
        <hgroup class="section-header">
            <span class="title">Novedad</span>
        </hgroup>
        <article class="section-content">
            <div class="article">
                <div class="article-header">
                    <p class="lead">{{ \App\TipsCategories::getNameCategory($tip['id_category']) }}</p>
                    
                    <h3>{{ $tip['title'] }}</h3>
                </div>
                <div class="article-media">
                    @if($tip['url_youtube'])
                        <div class="embed-responsive">
                            <!--<iframe width="560" height="315" src="{{ $tip['url_youtube'] }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>-->
                            <iframe width="560" height="315" src="{{ $tip['url_youtube'] }}" frameborder="0" allowfullscreen></iframe>
                        </div>
                    @endif
                    @if($tip['image'])
                        <div>
                            <img class="card-img-top" src="{{ asset('storage/app/public/tips/') }}/{{ $tip['id'] }}/{{ $tip['image'] }}" />
                        </div>
                    @endif
                </div>
                <div class="article-body">
                    <p>{{ $tip['description'] }}</p>
                </div>
                <div class="article-footer">
                    <p>
                        <a href="{{ url('/novedades') }}">Volver</a>
                    </p>
                </div>
            </div>
        </article>
    </section>
</main>
@endsection