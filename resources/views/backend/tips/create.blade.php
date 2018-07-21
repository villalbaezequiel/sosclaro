@extends('layouts.backend')

@section('title', "Novedades / Alta")
@section('content')
{!! Form::open(['route' => 'admin.tips.store', 'method' => 'POST', 'enctype' => 'multipart/form-data' ]) !!}
    <div class="form-group">
        <label>Titulo Novedad:</label>
        <input type="text" class="form-control" name="title_tip" placeholder="Nombre Novedad" required>
    </div>

    <div class="form-group">
        <label>Categoría:</label>
        <select class="form-control" name="id_category" required>
            <option value="">Seleccionar...</option>
            @foreach($tips_categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>URL Youtube:</label>
        <input type="text" class="form-control" name="url_youtube_tip" placeholder="URL Youtube">
    </div>

    <div class="form-group">
        <label>Descripción:</label>
        <textarea name="description_tip"></textarea>
    </div>

    <div class="custom-file">
        <input type="file" class="custom-file-input" id="imagen_tip" name="imagen_tip">
        <label class="custom-file-label" for="imagen_tip">Imagén</label>
    </div>

    <div class="form-group"></div>
    
    <div class="form-group">
        <label for="active_tip">Activo:</label>
        <select class="form-control" name="active_tip" required>
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Crear</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection
@section('javascript')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=riuoruyg909exdyi8li3fpio2hio09etiaznrcuqv3e7xs4a"></script>
    <script>
        tinymce.init({ 
        selector:'textarea',
        menubar: false,
        toolbar: 'undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat'
    });
    </script>
@endsection