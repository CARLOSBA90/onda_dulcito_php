<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    <title>Backoffice</title>
  </head>
  <body>
       @yield('content')

        <script src="{{ asset('js/jquery-3.5.1.js') }}"> </script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>

        <script>
          $(document).ready(function () {
                    $('#recetas').DataTable({
                    "lengthMenu": [[5,10,50,-1], [5,10,50,"Todos"]]
                  } );
                });
          </script>

    </body>
</html>