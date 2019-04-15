@extends('layouts.frontend')

@section('title', "Galería de Imágenes")
@section('content')

@include('frontend.components.header')

<main class="main main-user">
  <section class="section-wrapper">
      <hgroup class="section-header">
          <span class="title">Galería de Imágenes</span>
          <aside>
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-sliders"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                  <h6 class="dropdown-header">Ordenar</h6>
                  <a id="sortPuntosAsc" class="dropdown-item" href="#">Más Nuevas</a>
                  <a id="sortPuntosDesc" class="dropdown-item" href="#">Más Antiguas</a>
                  <a id="sortNombre" class="dropdown-item" href="#">Alfabéticamente</a>
              </div>
          </aside>
      </hgroup>

      <article class="section-content">
        <div align="center">
          <button class="btn btn-default filter-button" data-filter="all">Galeria Completa</button>
          @foreach($categories as $category)
            <button class="btn btn-default filter-button" data-filter="{{ $category->id }}">{{ $category->name }}</button>
          @endforeach
        </div>
      </article>

      <article class="section-content" id="catalogo">
          @foreach($images as $image)
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 producto filter {{ $image->id_category }}">
                <a class="card thumbnail" href="javascript:void(0)" data-image-id="{{ $image->id }}" data-toggle="modal" data-title="{{ $image->name }}"
                   data-description="{{ $image->description }}" data-image="{{ asset('storage/app/public/galeria_imagenes/') }}/{{ $image->id.'/'.$image->src }}" data-target="#image-gallery">
                  <img class="img-thumbnail" style=" width: 100%; height: 250px;object-fit: cover;" src="{{ asset('storage/app/public/galeria_imagenes/') }}/{{ $image->id.'/'.$image->src }}" alt="{{ $image->name }}">
                </a>
              </div>
          @endforeach
      </article>

      <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="image-gallery-title"></h4>
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span>
              </button>
            </div>
            <div class="modal-body">
              <img id="image-gallery-image" class="img-responsive col-md-12" style="max-width: 100%;" src="">
              <p style="padding: 10px;" id="image-gallery-description"></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i></button>
              <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i></button>
            </div>
          </div>
        </div>
      </div>

  </section>
</main>
@endsection
@section('javascript')
<script type="text/javascript" src="{{ asset('assets/frontend/js/gallery.js') }}"></script>
@endsection
@section('css')
<style>
.filter-button {
  margin-bottom: 10px;
}
.filter-button:hover {
  border: 1px solid #000;
  color: #000;
  background-color: #fff;
}
</style>
@endsection
