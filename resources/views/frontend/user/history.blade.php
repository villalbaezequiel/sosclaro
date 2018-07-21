@extends('layouts.frontend')

@section('title', "Historial de cuenta")
@section('content')

@include('frontend.components.header')         
<main class="main main-user">
    <section class="section-wrapper">
        <hgroup class="section-header">
            <span class="title">Historial de cuenta</span>
        </hgroup>
        <article class="section-content">
            <div class="card">
                <div class="card-body text-center">
                    <div class="col col-md-6">
                        <h3>
                            <span class="badge badge-secondary">{{ \App\Dni::getPuntos(Auth::user()->id) }} puntos</span>
                        </h3>
                        <span>Puntos disponibles para canjes</span>
                    </div>
                    <div class="col col-md-6">
                        <h3>
                            <span class="badge badge-secondary">{{ \App\Dni::getPuntosHistorical(Auth::user()->id) }} históricos</span>
                        </h3>
                        <span>Puntos obtenidos desde la registración</span>
                    </div>
                </div>
            </div>
        </article>
        <article class="section-content">
            <div class="card">
                <div class="card-header text-center">
                    <strong>Movimientos</strong>
                </div>
                @if($exchanges || $user_profile || $guests_user)

                <div class="card-body">
                    <table class="table table-sm table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Fecha</th>
                                <th scope="col">Concepto</th>
                                <th scope="col">Puntos</th>
                            </tr>
                        </thead>
                        <tbody class="order-date">
                            @if(!empty($exchanges[0]))
                                @foreach($exchanges as $canje)
                                <tr data-date="{{ $canje['updated_at'] }}">
                                    <td>{{ \App\Functions::getDate($canje['updated_at']) }}</td>
                                    <td>Canje {{ \App\Products::getName($canje['id_product']) }}</td>
                                    <td>-{{ \App\Products::getValuePuntos($canje['id_product']) }}</td>
                                </tr>
                                @endforeach
                            @endif
                            
                            @if(!empty($guests_user[0]))
                                @foreach($guests_user as $guest)
                                <tr data-date="{{ $guest['updated_at'] }}">
                                    <td>{{ \App\Functions::getDate($guest['updated_at']) }}</td>
                                    <td>Puntos obtenidos por completar encuesta</td>
                                    <td>{{ \App\Guest::getPuntos($guest['id_guest']) }}</td>
                                </tr>
                                @endforeach
                            @endif
                            
                            @if($user_profile[0]['status'] == 1)
                            <tr data-date="{{ $user_profile[0]['updated_at'] }}">
                                <td>{{ \App\Functions::getDate($user_profile[0]['updated_at']) }}</td>
                                <td>Puntos obtenidos por completar perfil</td>
                                <td>20</td>
                            </tr>
                            @endif
                            
                            @if(!empty($desempenos[0]))
                                @foreach($desempenos as $desemp)
                                <tr data-date="{{ $desemp['updated_at'] }}">
                                    <td>{{ \App\Functions::getDate($desemp['updated_at']) }}</td>
                                    <td>{{ $desemp['asunto'] }}</td>
                                    <td>{{ $desemp['puntos'] }}</td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                @else
                    <p class="text-center">Aún no se han realizado movimientos.</p>
                @endif
            </div>
        </article>
    </section>
</main>
@endsection

@section('javascript')
<script type="text/javascript">
    $(document).ready(function(){
        
        $(function() {
            $(".order-date tr").sort(sort_li).appendTo('.order-date');
            function sort_li(a, b) {
              return ($(b).data('date')) > ($(a).data('date')) ? 1 : -1;
            }
        });
        
    });
</script>
@endsection