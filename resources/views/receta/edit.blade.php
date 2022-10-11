<!doctype html>
  <html lang="es">
  <head>
      @include('resources.backoffice.header')
      @include('resources.backoffice.crud.editor_header')
  </head>
<body>
<div class="m-2">
    <h1 class="bg-info text-white text-center">EDITAR RECETA: {{$receta->id}}</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/recetas/{{$receta->id}}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value='{{$receta->nombre}}'>
    </div>

      <div class="mb-3" style="display:none;" id="div-editor">
        <label for="descripcion" class="form-label">Descripci&oacute;n</label>
        <textarea class="form-control" id="editor" name="descripcion" rows="10">{{$receta->descripcion}}</textarea>
      </div>

    <div class="mb-3">
      <div class="form-check form-switch">
        <label class="switch"><input type="checkbox" id="enabled" name="enabled" value="1" @if($receta->enabled==1) checked @endif><span class="slider round"></span></label>
        <label class="form-check-label" for="enabled">Estado</label>
      </div>
    </div>

      <div class="mb-3">
        <label for="published_at">Fecha Publicaci&oacute;n</label>
        <input type="datetime-local" id="published_at" name="published_at" value='{{$receta->published_at}}'>
    </div>

     <button type="submit" class="btn btn-success" tabindex="4">Guardar</button>
     <a href="/recetas" class="btn btn-primary">Volver</a>
    </form>
</div>
@include('resources.backoffice.footer_script')
@include('resources.backoffice.crud.editor_footer')
</body>
</html>

