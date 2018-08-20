@extends('layouts.frontend')

@section('title', "Resultados")
@section('content')

@include('frontend.components.header')

<main class="main main-user">
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
    
    <section class="section" id="section-results-month">
      <div class="col-md-12">
        <input type="hidden" id="id_category_result" value="{{ $name_category['id'] }}" />
        <ul class="text-white list-inline">
          @foreach($months as $key => $value)
            <?php
              $checkMonth = (date('n') == $key ? 'font-weight-bold' : '');
              $checkMonthSpan = (date('n') == $key ? 'circle-white' : '');;  
            ?>
          <li class="list-months-results list-inline-item text-center c-poniter {{$checkMonth}}" data-key="{{$key}}">{{$value}} <p class="{{$checkMonthSpan}}"></p></li>
          @endforeach
        </ul>
      </div>
    </section>
        
    <section class="section btn-black" id="section-results-best-vendedor">
      <div class="row d-flex">
        @if(!empty($results[0]))
          <div class="col-md-2 margin-center">
            <div class="card">
              <img class="card-img-top" src="http://localhost/frandresgo-clarothml-09075f920518/assets/images/2.png">
            </div>
          </div>
          <div class="col-md-6 margin-center">
            <div class="card" style="background-color: inherit;">
              <div class="card-body vertical-center">
                <ul class="list-group" style="list-style: none;">
                  <li class="h4 text-danger font-weight-bold margin-top-none">{{ $name_category['name'] }}:</li>
                  <li class="h4 text-white font-weight-bold margin-top-none name-user-result-best">{{ $results[0]['user_name'] }}</li>
                  <li class="h4 text-white margin-top-none"><span class="name-region-result-best">{{ $results[0]['region_name'] }}</span> <span style="font-weight: 100;">|</span> <span class="name-agente-result-best" style="font-weight: 100;">{{ $results[0]['agente_name'] }}</span></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-4 margin-center">
            <div class="card" style="background-color: inherit;">
              <div class="card-body vertical-center">
                <p class="h4 text-white font-weight-bold hr-white"><span class="puntos-result-best">{{ $results[0]['puntos'] }}</span>pts. | <span class="desempeno-result-best" >{{ $results[0]['desempeno'] }}</span>%</p>
              </div>
            </div>
          </div>
        @else
        <div class="h4 text-white font-weight-bold margin-center">No se encontró Resultados para el Mes seleccionado.</div>
        @endif
      </div>
    </section>
    <section class="section" id="section-results-table">
        <div class="card">
          <div class="card-body">
            <table class="table table-sm table-striped table-hover text-center">
              <thead class="thead-dark text-uppercase">
                <tr>
                  <th scope="col" class="head-menu-start">Region</th>
                  <th scope="col">Puesto</th>
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
                    <td>{{ $result['puntos'] }}</td>
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
       
       var idCategory = $("#id_category_result").val();
       $.ajax({
            type: 'GET',
            url: '/resultados/'+idCategory+'/'+$(this).data('key'),
            dataType: 'json',
            success: function(data){
                var results = data.results;
                if(results.length === 0){
                    alert('No se encontró Resultados para el Mes seleccionado.');
                } else {
                    //best
                    $(".name-user-result-best").empty().text(results[0]['user_name']);
                    $(".name-region-result-best").empty().text(results[0]['region_name']);
                    $(".name-agente-result-best").empty().text(results[0]['agente_name']);
                    $(".puntos-result-best").empty().text(results[0]['puntos']);
                    $(".desempeno-result-best").empty().text(results[0]['desempeno']);
                    
                    //list results table
                    $(".list-results-table").empty();
                    $.each(results, function(i,v){
                      $(".list-results-table").append("<tr><th scope='row'>"+v['region_name']+"</th><td>"+v['puesto']+"</td><td>"+v['user_name']+"</td><td>"+v['agente_name']+"</td><td>"+v['puntos']+"</td><td>"+v['desempeno']+"%</td></tr>");
                    });
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