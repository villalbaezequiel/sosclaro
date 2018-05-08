@extends('layouts.frontend')

@section('title', "Desempeño")
@section('content')

@include('frontend.components.header')

<main class="main main-user">
    <section class="section-wrapper">
        <hgroup class="section-header">
            <span class="title">Ranking</span>
        </hgroup>
        <article class="section-content">
            <div class="card text-center">
                <div class="card-header">
                    <h4>Tienes acumulados
                        <span class="badge badge-danger">{{ \App\UsersProfile::getPuntosHistory(Auth::user()->id) }} puntos</span> históricos</h4>
                </div>
                <div class="card-body">
                    <div class="row card-text">
                        <div class="col col-md-6">
                            <h3>
                                <span class="badge badge-secondary">Puesto 0</span>
                            </h3>
                            <p>Posición para la región:
                                <strong>X</strong>
                            </p>
                        </div>
                        <div class="col col-md-6">
                            <h3>
                                <span class="badge badge-secondary">Puesto 0</span>
                            </h3>
                            <p>Posición para la región:
                                <strong>Nacional</strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <article class="section-content">
            <div class="card">
                <div class="card-header text-center">
                    <strong>Posiciones por región</strong>
                </div>
                <div class="card-body">
                    <p id="sin_data" class="text-center">Datos no cargados por el momento.</p>
                    
                    <form class="text-center">
                        <div class="form-group">
                            <select class="form-control" id="selectDesempenoRegion">
                                @foreach($regions as $region)
                                    <option value="{{ $region['id'] }}">{{ $region['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                    <table class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Puesto</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Puntos</th>
                            </tr>
                        </thead>
                        <tbody id="content_ranking">
                        </tbody>
                    </table>
                    
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
        
        $.ajax({
            type: 'GET',
            url: '/ranking/'+$(this).val(),
            dataType: 'json',
            success: function(data){
                
                $("#sin_data").hide();
                $("#content_ranking").empty();
                
                $.each(data, function(key, value){
                    var count = 1;
                    $.each(value, function(k, v){
                        console.log(v);
                        $("#content_ranking").append('<tr><th scope="row">'+v.puesto+'</th><td>'+v.name+'</td><td>'+v.puntos+'</td></tr>');
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