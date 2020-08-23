@extends('layouts.frontend')

@section('title', "Resultados")
@section('content')

@include('frontend.components.header')

<main class="main main-user">
    <!--
    <section class="section section-dashboard">
        <div class="slider slider-single">
          @if(!empty($modals))
            @foreach($modals as $modal)
                <div class="slider-item">
                    <a href="{{ $modal->url }}" target="_blank">
                        <img class="visible-md-up" src="{{ asset('storage/app/public/modals/desktop/') }}/{{ $modal->id.'/'.$modal->image_desktop }}">
                        <img class="visible-xs visible-sm" src="{{ asset('storage/app/public/modals/mobile/') }}/{{ $modal->id.'/'.$modal->image_mobile }}">
                    </a>
                </div>
            @endforeach
          @endif
        </div>
    </section>
    -->
    
    <section class="section" id="section-results-month">
      <div class="col-md-12">
        <input type="hidden" id="id_category_result" value="{{ $name_category['id'] }}" />
        <ul class="text-white list-inline">
            @if($name_category['id'] == 4)
              <li class="list-months-results list-inline-item text-center c-poniter" data-key="1_semestre" style="width: 50%!important;">PRIMER SEMESTRE <p class=""></p></li>
              <li class="list-months-results list-inline-item text-center c-poniter" data-key="2_semestre" style="width: 50%!important;">SEGUNDO SEMESTRE <p class=""></p></li>
            @else
              @foreach($months as $key => $value)
                <?php
                  $checkMonth = (date('n') == $key ? 'font-weight-bold' : '');
                  $checkMonthSpan = (date('n') == $key ? 'circle-white' : '');
                ?>
              <li class="list-months-results list-inline-item text-center c-poniter {{$checkMonth}}" data-key="{{$key}}">{{$value}} <p class="{{$checkMonthSpan}}"></p></li>
              @endforeach
            @endif
        </ul>
      </div>
    </section>
    
    <section class="section section-dashboard">
      <div class="slider slider-single">
        <div class="slider-item">
          <a target="_blank">
            @if(isset($imagen_destacada) && !empty($imagen_destacada))
              <img id="imagen_destacada" class="visible-md-up" src="{{ asset('storage/app/public/results_media') }}/{{ $name_category['id'] }}/{{ date('n') }}/{{ $imagen_destacada->image }}" style="margin: 0 auto;">
            @else
              <img id="imagen_destacada" class="visible-md-up" src="" style="margin: 0 auto;">
            @endif
          </a>
        </div>
      </div>
      <input type="hidden" id="get-url-imagen-destacada" value="{{ asset('storage/app/public/results_media') }}/{{ $name_category['id'] }}/">
    </section>
    
    <section class="section" id="section-results-table">
        <div class="card">
          <div class="card-body">
            <table class="table table-sm table-striped table-hover">
              <thead class="thead-dark text-uppercase">
                <tr>
                  <th scope="col" class="head-menu-start">Region</th>
                  <th scope="col">Nombre <!-- <span class="d-none d-md-inline-block">y Apellido</span> --></th>
                  <th scope="col">Agencia</th>
                  <th scope="col">Puntos</th>
                  <th scope="col" class="head-menu-stop">Total</th>
                </tr>
              </thead>
              <tbody class="text-white list-results-table">
              @if(!empty($results[0]))
                @foreach($results as $result)
                  <tr>
                    <th scope="row">{{ $result['region_name'] }}</th>
                    <td>{{ $result['user_name'] }}</td>
                    <td>{{ $result['agente_name'] }}</td>
                    @if($name_category['id'] == 1)
                    <td>{{ $result['puntos'] }}</td>
                    @endif
                    <td>{{ round($result['desempeno'],2) }} %</td>
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
            url: '/resultados/'+idCategory+'/'+$(this).data('key'),
            dataType: 'json',
            success: function(data){
                var results = data.results;
                var idCategory = data.id_category;
                var imagenDestacada = data.imagen_destacada;
                var month = data.month;
                
                if(results.length === 0){
                    //alert('No se encontraron resultados para el mes seleccionado.');
                    //   $(".list-months-results").removeClass('font-weight-bold');
                    //   $(".list-months-results p").removeClass('circle-white');
                    $(".list-results-table").empty();
                    $("#imagen_destacada").remove();

                } else {
                    
                    if($(".hidden-results-start")){
                      $(".hidden-results-start").addClass('hidden');
                    }
                                        
                    //list results table
                    $(".list-results-table").empty();
                    if(idCategory === 1){
                      $.each(results, function(i,v){
                        $(".list-results-table").append("<tr><th scope='row'>"+v['region_name']+"</th><td>"+v['user_name']+"</td><td>"+v['agente_name']+"</td><td>"+v['puntos']+"</td><td>"+parseFloat(v['desempeno']).toFixed(2)+"%</td></tr>");
                      });   
                    } else {
                      $.each(results, function(i,v){
                        $(".list-results-table").append("<tr><th scope='row'>"+v['region_name']+"</th><td>"+v['user_name']+"</td><td>"+v['agente_name']+"</td><td>"+v['puntos']+"</td><td>"+parseFloat(v['desempeno']).toFixed(2)+"%</td></tr>");
                      });  
                    }
                    
                    //imagen destacada 
                    if(imagenDestacada[0]){
                      $('#slider-item').append('<img id="imagen_destacada" class="visible-md-up" src="" style="margin: 0 auto;">');
                      $("#imagen_destacada").attr("src", $("#get-url-imagen-destacada").val()+month+"/"+imagenDestacada[0].image);
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