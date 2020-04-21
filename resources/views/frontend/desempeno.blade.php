@extends('layouts.frontend')

@section('title', "Mis Logros")
@section('content')

@include('frontend.components.header')

<main class="main main-user">
    <section class="section">
        <article class="section-content" style="margin-bottom: -3.5rem;">
            <div class="card text-center">
                <div class="card-body background-black-color-white">
                    <div class="row card-text">
                        <div class="col-md-4">
                          @foreach(\App\Functions::getMonths() as $key => $value)
                            @if($key == date('n'))
                              <h4>{{ $value }}</h4>
                            @endif
                          @endforeach
                          <h5>{{ date('Y') }}</h5>
                        </div>
                        <div class="col-md-4" style="background:linear-gradient(to right, #A7A8AA , white, #CCC);">
                          <h5 class="nav-month-result font-black">{{ $ultimo_desempeno['puntos'] }}</h5>
                          <div class="nav-month-description font-black"><strong>PUNTOS</strong></div>
                        </div>
                        <div class="col-md-4" style="background:linear-gradient(to right, #A7A8AA , white, #CCC);">
                          <h5 class="nav-month-result font-black">{{ $ultimo_desempeno['total'] }}</h5>
                          <div class="nav-month-description font-black"><strong>TOTAL</strong></div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <!-- Aca esta el chart -->
        <article class="section-content">
          <div class="card">
            <canvas id="graphCanvas"></canvas>
            <div class="text-center background-black-color-white" style="padding: 5px;">
              <strong>2018</strong>
            </div>
          </div>
        </article>
        <article class="section-content">
            <div class="card">
                <div class="card-header text-center background-black-color-white" style="padding: 5px;">
                    <strong>Historial</strong>
                </div>
                <div class="card-body">
                    <form class="row text-center">
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="selectDesempenoMes">Mes</label>
                                <select class="form-control" id="selectDesempenoMes">
                                  @foreach(\App\Functions::getMonths() as $key => $val)
                                    <option value="{{ $key }}" @if($key == date('n')) selected="selected" @endif>{{ $val }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>

                        @if($type_user != '' && $type_user != 'VENDEDOR' && $type_user != 'Vendedor' && $type_user != 'vendedor')
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="selectDesempenoUserRole">Usuarios Relacionados</label>
                                <select class="form-control" id="selectDesempenoUserRole">
                                    <option value="0">Seleccionar...</option>
                                  @foreach($list_users as $key => $val)
                                    <option value="{{ $val }}">{{ \App\Dni::getName($val) }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        @else
                        <input type="hidden" name="selectDesempenoUserRole" id="selectDesempenoUserRole" value="0" />
                        @endif
                    </form>
                    <!-- Esto va a estar más adelante pero dinámico (tienen que aprobar el presupuesto)-->
<!--                                <p class="text-center">
                        <img src="http://mejoresvendedores.com.ar/dev/maquetado/img/grafico-lineas.png" alt="">
                    </p>-->
                    <table class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Fecha</th>
                                <th scope="col">Concepto</th>
                                <th scope="col">Puntos</th>
                            </tr>
                        </thead>
                        <tbody id="content_desempeno">
                          @if(isset($all_desempeno[0]) && !empty($all_desempeno[0]))
                            @foreach($all_desempeno as $desempenos)
                                <tr>
                                    <td>{{ \App\Functions::getDate($desempenos->created_at) }}</td>
                                    <td>{{ $desempenos->asunto }}</td>
                                    <td>{{ $desempenos->puntos }}</td>
                                </tr>
                            @endforeach
                          @endif
                        </tbody>
                    </table>
                    <p id="empty_content_desempeno" @if(!isset($all_desempeno[0]) && empty($all_desempeno[0])) class="text-center"  @else class="text-center hidden" @endif>Datos no cargados por el momento.</p>
                </div>
            </div>
        </article>
    </section>
</main>
@endsection
@section('javascript')
<script>
$(document).ready(function () {
    showGraph($("#selectDesempenoUserRole").val());

    //history perfomance
    $("#selectDesempenoMes").change(function(){

        var userCheck = $("#selectDesempenoUserRole").val();

        $.ajax({
            type: 'GET',
            url: '/desempeno_for_month/'+$(this).val()+'/'+userCheck,
            dataType: 'json',
            success: function(data){
              var desempenos_for_month = data.desempenos_for_month;

              $("#content_desempeno").empty();
              $.each(desempenos_for_month, function(k, v){
                $("#content_desempeno").append('<tr><td>'+v.created_at+'</td><td>'+v.asunto+'</td><td>'+v.puntos+'</td></tr>');
              });
              if(desempenos_for_month.length === 0){
                $("#empty_content_desempeno").removeClass('hidden');
              } else {
                $("#empty_content_desempeno").addClass('hidden');
              }
            },
            error: function(xhr, status){
                console.log('Error: '+xhr);
            }
        });

    });

    $("#selectDesempenoUserRole").change(function(){

        showGraph($(this).val());

        var month = $("#selectDesempenoMes").val();

        $.ajax({
            type: 'GET',
            url: '/desempeno_for_month/'+month+'/'+$(this).val(),
            dataType: 'json',
            success: function(data){
              var desempenos_for_month = data.desempenos_for_month;

              $("#content_desempeno").empty();
              $.each(desempenos_for_month, function(k, v){
                $("#content_desempeno").append('<tr><td>'+v.created_at+'</td><td>'+v.asunto+'</td><td>'+v.puntos+'</td></tr>');
              });
              if(desempenos_for_month.length === 0){
                $("#empty_content_desempeno").removeClass('hidden');
              } else {
                $("#empty_content_desempeno").addClass('hidden');
              }
            },
            error: function(xhr, status){
                console.log('Error: '+xhr);
            }
        });
    });

});

    function showGraph(id_user){



        $.ajax({
            type: 'GET',
            url: '/desempeno_grafico/'+id_user,
            dataType: 'json',
            success: function(data){
                var allDesempeno = data.allDesempeno;
                var labels = [];
                var puntos = [];

                $.each(allDesempeno, function(key, value){
                  labels.push(key);
                  puntos.push(value);
                });

                var historialUsuario = {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Puntos',
                            data: puntos,
                            fill: false,
                            borderColor: 'rgb(0, 165, 142)',
                            backgroundColor: "rgba(159,170,174,0.8)",
                            lineTension: 0.1
                        }
                    ]
                };

                    var graphTarget = $("#graphCanvas");

                    var myChart = new Chart(graphTarget, {
                        type: 'bar',
                        data: historialUsuario,
                        options: {
                          scales: {
                            yAxes: [
                              {
                                ticks: {
                                  beginAtZero: true
                                }
                              }
                            ]
                          }
                        }
                    });

            },
            error: function(xhr, status){
                console.log('Error: '+xhr);
            }
        });
    }
</script>
<style>
.card {
  border: 1px solid #000!important;
}
.background-red {
  background-color: red;
}
.background-white {
  background-color: #ffffff;
}
.background-black-color-white {
  background-color: black;
  color: #ffffff;
}
.nav-month-description {
  background-color: rgba(159,170,174,0.8);
  width: 70%;
  margin: 0 auto;
  padding: 5px;
}
.nav-month-result {
  margin-top: 1.5%!important;
}
.font-black {
    color: #2b2e31;
}
</style>
@endsection
