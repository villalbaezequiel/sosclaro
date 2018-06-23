@extends('layouts.frontend')

@section('title', "Novedades")
@section('content')

@include('frontend.components.header')
<main class="main main-user">
    <section class="section-wrapper">
        <hgroup class="section-header">
            <span class="title">Novedades</span>
        </hgroup>
        <article class="section-content">
            @foreach($tips_categories as $category)
            <div class="card">
                <div class="card-header text-center">
                    <strong>{{ $category['name'] }}</strong>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        @foreach(\App\Tips::getTips($category['id']) as $tip)
                            <a class="list-group-item list-group-item-action" href="{{ url('novedades').'/'.$tip['id'] }}">{{ $tip['title'] }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </article>
    </section>
</main>
@endsection