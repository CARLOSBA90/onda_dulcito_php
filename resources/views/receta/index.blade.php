@extends('resources.assets')

@section('content')
<h1 class="bg-info text-white text-center"> RECETAS </h1>
<div class="m-2">
<a href="recetas/create" class="btn btn-success">Nuevo </a>
</div>

<table id="recetas" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
  <thead class="bg-primary text-white">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Publicado</th>
      <th scope="col">Activo</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($recetas as $receta)
      <tr>
           <td>{{$receta->id}}</td>
           <td>{{$receta->nombre}}</td>
           <td>{{$receta->published_at}}</td>
           <td>{{$receta->enabled}}</td>
           <td><a class="btn btn-primary" href="/recetas/{{$receta->id}}/edit"> Editar</a></td>

           <td>
            <form action="{{ route ('recetas.destroy',$receta->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
          </td>
      </tr>

     @endforeach
  </tbody>
</table>

@endsection






