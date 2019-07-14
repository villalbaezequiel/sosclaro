@extends('layouts.backend')

@section('title', "PopUp")

@section('message')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection

@section('nav-button')
<a class="btn btn-primary mb-3" href="{{ url('/admin/popup/create') }}">Nuevo PopUp</a>
@endsection

@section('content')
<table class="table table-bordered" id="list_popup" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Url</th>
            <th>Categoría</th>
            <th>Mes</th>
            <th>Activo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>  
        @foreach($popup as $guest)
        
        <!-- check category -->
        <?php $checkCategory = "";
        foreach($result_categories as $resultC):
            if($guest->id_category == "resultC_$resultC->id"): 
                $checkCategory = "Resultados - $resultC->name";
            endif;
        endforeach;
        
        foreach($bonus_track_categories as $bonus_trackC):
            if($guest->id_category == "bonus_trackC_$bonus_trackC->id"): 
                $checkCategory = "Bonus Track - $bonus_trackC->name";
            endif;
        endforeach; ?>
        
        <tr>
            <td>{{ $guest->id }}</td>
            <td>{{ $guest->name }}</td>
            <td>{{ $guest->url }}</td>
            <td>{{ $checkCategory }}</td>
            <td>{{ $guest->month }}</td>
            <td>{{ \App\Functions::getActive($guest->active) }}</td>
            <td>
                {!! Form::open(['route' => ['admin.popup.destroy', $guest->id], 'method' => 'DELETE']) !!}
                    <a href="{{ url('/admin/popup/'.$guest->id.'/edit') }}" class="btn btn-outline-primary">Editar</a>
                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('javascript')
<script type="text/javascript">
$(document).ready(function(){
    $("#list_popup").DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
    });
});
</script>
@endsection