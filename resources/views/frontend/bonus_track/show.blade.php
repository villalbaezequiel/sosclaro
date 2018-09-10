@extends('layouts.frontend')

@section('title', "Bonus Track")
@section('content')

@include('frontend.components.header')

<main class="main main-user">
    <section class="section" id="section-results-month">
      <div class="col-md-12">
        <input type="hidden" id="id_category_result" value="{{ $name_category['id'] }}" />
        <ul class="text-white list-inline">
          @foreach($months as $key => $value)
            <?php
              $checkMonth = (date('n') == $key ? 'font-weight-bold' : '');
              $checkMonthSpan = (date('n') == $key ? 'circle-white' : '');
            ?>
          <li class="list-months-results list-inline-item text-center c-poniter {{$checkMonth}}" data-key="{{$key}}">{{$value}} <p class="{{$checkMonthSpan}}"></p></li>
          @endforeach
        </ul>
      </div>
    </section>
        
    <section class="section section-dashboard">
      <div class="slider slider-single">
        <div class="slider-item">
          <a target="_blank">
            @if(isset($imagen_destacada) && !empty($imagen_destacada))
              <img id="imagen_destacada" class="visible-md-up" src="{{ asset('storage/app/public/bonus_track_media') }}/{{ $name_category['id'] }}/{{ $imagen_destacada->image }}" style="margin: 0 auto;">
            @else
              <img id="imagen_destacada" class="visible-md-up" src="" style="margin: 0 auto;">
            @endif
          </a>
        </div>
      </div>
    </section>
    
    <section class="section" id="section-results-table">
        <div class="card">
          <div class="card-body">
            <table class="table table-sm table-striped table-hover text-center">
              <thead class="thead-dark text-uppercase">
                <tr>
                  <th scope="col" class="head-menu-start">Region</th>
                  <th scope="col">Nombre <!-- <span class="d-none d-md-inline-block">y Apellido</span> --></th>
                  <th scope="col">Agencia</th>
                  <th scope="col">Puntos</th>
                  <th scope="col" class="head-menu-stop">Desempeño</th>
                </tr>
              </thead>
              <tbody class="text-white list-results-table">
              @if(!empty($results[0]))
                @foreach($results as $result)
                  <tr>
                    <th scope="row">{{ $result['region_name'] }}</th>
                    <td>{{ $result['puesto'] }}</td>
                    <td>{{ $result['user_name'] }}</td>
                    <td>{{ $result['agente_name'] }}</td>
                    <td>{{ $result['desempeno'] }}%</td>
                  </tr>
                @endforeach
              @endif
              </tbody>
            </table>
          </div>
        </div>
    </section>
</main>
@endsection
@section('javascript')
<script type="text/javascript">
$(document).ready(function(){
    $(".list-months-results").click(function(){
        
        $(".list-months-results").removeClass('font-weight-bold');
        $(".list-months-results p").removeClass('circle-white');
        
        $(this).addClass('font-weight-bold');
        $(this).find('p').addClass('circle-white');
       
       var idCategory = $("#id_category_result").val();
       $.ajax({
            type: 'GET',
            url: '/bonus-track/'+idCategory+'/'+$(this).data('key'),
            dataType: 'json',
            success: function(data){
                var results = data.results;
                var imagenDestacada = data.imagen_destacada;
                
                if(results.length === 0){
                    alert('No se encontró Bonus Track para el Mes seleccionado.');
                    $(".list-months-results").removeClass('font-weight-bold');
                    $(".list-months-results p").removeClass('circle-white');
                } else {
                    
                    if($(".hidden-results-start")){
                      $(".hidden-results-start").addClass('hidden');
                    }
                    
                    //list results table
                    $(".list-results-table").empty();
                    $.each(results, function(i,v){
                      $(".list-results-table").append("<tr><th scope='row'>"+v['region_name']+"</th><td>"+v['user_name']+"</td><td>"+v['agente_name']+"</td><td>"+v['puntos']+"</td><td>"+v['desempeno']+"%</td></tr>");
                    });
                    
                    //imagen destacada 
                    if(imagenDestacada[0]){
                      $("#imagen_destacada").attr("src", imagenDestacada[0].image);
                    }
                }
            },
            error: function(xhr, status){
                console.log('Error: '+xhr);
            }
        });
    });
});    
</script>
@endsection