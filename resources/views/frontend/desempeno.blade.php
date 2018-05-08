@extends('layouts.frontend')

@section('title', "Desempeño")
@section('content')

@include('frontend.components.header')

<main class="main main-user">
    <section class="section-wrapper">
        <hgroup class="section-header">
            <span class="title">Desempeño</span>
        </hgroup>
        <article class="section-content">
            <div class="card text-center">
                <div class="card-header">
                    <h4>Esta semana sumaste
                        <span class="badge badge-danger">{{ $desempeno_user['puntos'] }} puntos</span>
                    </h4>
                </div>
                                
                <div class="card-body">
                    <div class="row card-text">
                        <div class="col-md-6">
                            <h1 class="mb-0">
                                <i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i> {{ $desempeno_user['promedio'] }}%</h1>
                        </div>
                        <div class="col-md-6 text-left">
                            <h6>
                                <i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i> {{ $desempeno_user['indicador_1'] }}% Indicador 1</h6>
                            <h6>
                                <i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i> {{ $desempeno_user['indicador_2'] }}% Indicador 2</h6>
                        </div>
                    </div>
                </div>
                <div class="card-footer">Datos para la semana del {{ \App\Functions::getDate($desempeno_user['created_at']) }}</div
            </div>
        </article>
        <article class="section-content">
            <div class="card">
                <div class="card-header text-center">
                    <strong>Ganadores</strong>
                </div>
                <div class="card-body">
                    
                    @if($desempenos_name[0])
                    <div class="row text-center">
                        <form class="col col-md-6" id="form_desempenos">
                            <div class="form-group">
                                <label for="desempenos_name">Mes</label>
                                <select class="form-control" id="desempenos_name" name="desempenos_name">
                                    <option>Seleccionar...</option>
                                    @foreach($desempenos_name as $desemp_name)
                                    <option value="{{ $desemp_name['name'] }}">{{ $desemp_name['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="selectDesempenoRegion">Región</label>
                                <select class="form-control" id="selectDesempenoRegion">
                                    @foreach($regions as $region)
                                    <option value="{{ $region['id'] }}">{{ $region['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <table class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Puesto</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Puntos</th>
                            </tr>
                        </thead>
                        <tbody id="content_desempeno">
                            
                        </tbody>
                    </table>
                    @else
                        <p class="text-center">Datos no cargados por el momento.</p>
                    @endif
                </div>
            </div>
        </article>
    </section>
</main>
@endsection

@section('javascript')
<script type="text/javascript">
$(document).ready(function(){
    
    $("#selectDesempenoRegion").change(function(){
        
    });
    
    $("#desempenos_name").change(function(){
        
        $.ajax({
            type: 'GET',
            url: '/desempeno_name/'+$(this).val(),
            dataType: 'json',
            success: function(data){
                $("#content_desempeno").empty();
                $.each(data, function(key, value){
                    var count = 1;
                    $.each(value, function(k, v){
                        console.log(v);
                        $("#content_desempeno").append('<tr class="'+v.id_region+'"><th scope="row">'+k+'</th><td>'+v.name_lastname+'</td><td>'+v.puntos+'</td></tr>');
                    })
                })
            },
            error: function(xhr, status){
                console.log('Error: '+xhr);
            }
        });
    
    });
    
});
</script>
@endsection