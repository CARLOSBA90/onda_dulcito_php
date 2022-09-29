<!doctype html>
<html lang="es">
  <head>
@include('resources.backoffice.header')
@include('resources.backoffice.crud.datatable_css')


  </head>
<body>
<div class="container-fluid">
<h1 class="bg-info text-white text-center"> RECETAS </h1>
<div class="m-2">
<a href="recetas/create" class="btn btn-success">Nuevo </a>
</div>

<table id="recetas" class="table table-striped table-bordered shadow-lg dt-responsive" style="width:100%">
  <thead class="bg-primary text-white">
    <tr>
      <th scope="col" class="text-center">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col" class="text-center">Fecha</th>
      <th scope="col" class="text-center">Estado</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($recetas as $receta)
      <tr>
           <td class="text-center">{{$receta->id}}</td>
           <td>{{$receta->nombre}}</td>
           <td class="text-center">>>Fecha<< {{$receta->published_at}}</td>
           <td class="text-center">{{$receta->enabled}} <label class="switch"><input type="checkbox" value="{{$receta->enabled}}" checked><span class="slider round"></span></label></td>
           <td class="text-center"><a class="btn btn-primary" href="/recetas/{{$receta->id}}/edit"> Editar</a></td>

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
</div>

@include('resources.backoffice.footer_script')
@include('resources.backoffice.crud.datatable_script')

<script>
  $(document).ready(function () {
            $('#recetas').DataTable({
            "lengthMenu": [[5,10,50,-1], [5,10,50,"Todos"]],
            "responsive": true,
            "autoWidth": true,
            "ordering":false,
              //  "processing": true,
              //  "serverSide": true,
              // "columns": [],
                    "language": {
                    "emptyTable":			"<i>No hay datos disponibles en la tabla.</i>",
                    "info":		   		"Del _START_ al _END_ de _TOTAL_ ",
                    "infoEmpty":			"Mostrando 0 registros de un total de 0.",
                    "infoFiltered":			"(filtrados de un total de _MAX_ registros)",
                    "infoPostFix":			"",
                    "lengthMenu":			"Mostrar _MENU_ registros",
                    "loadingRecords":		"Cargando...",
                    "processing":			"Procesando...",
                    "search":			"<span style='font-size:15px;'>Buscar:</span>",
                    "searchPlaceholder":		"Datos a buscar",
                    "zeroRecords":			"No se han encontrado coincidencias.",
                    "paginate": {
                        "first":			"Primera",
                        "last":				"Última",
                        "next":				"Siguiente",
                        "previous":			"Anterior"
                    },
                    "aria": {
                        "sortAscending":	"Ordenación ascendente",
                        "sortDescending":	"Ordenación descendente"
                    }
                },
          } );
        });
  </script>
</body>
</html>



