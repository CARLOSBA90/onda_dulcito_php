<?php
 header("Access-Control-Allow-Origin: *"); 
 include('conexion.php');
$consulta = 'select * from usuario';
$resultado = mysqli_query($conexion,$consulta); 
$usuario="usuario es: ";
while($registro=mysqli_fetch_assoc($resultado)){
$usuario.= $registro['nombre'];
}
 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Bud&iacute;n</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="css/styles.css" rel="stylesheet" />
          <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>-->
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
          <link href="css/bootstrap.min.css" rel="stylesheet" />
        <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" crossorigin="anonymous">-->
         <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
        <script src="js/jquery.js"></script>
        
 
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper" >
                <div class="sidebar-heading border-bottom bg-light principal">Backoffice</div>
                <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-2 principal"  href="#">General</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-2 " id="" href="#">Edicion</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-2 " id=""  href="#">Listados</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-2 " id=""   href="#">Estadisticas</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-2 " id="" href="#">Sugeridos</a>

                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle">Secciones</button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#documentacion">Documentación Web</a></li> 
                            <li class="nav-item"><a class="nav-link" href="#">Salir del sistema</a></li> 
                             
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
                    <div id="principal" name="principal">

                    <table class="display dataTable no-footer">
                      <thead>
                        <tr>
                          <th class="sort">ID Receta</th>
                          <th class="sort">Nombre</th>
                          <th class="sort">Descripci&oacute;n</th>
                          <th class="sort">Secci&oacute;n</th>
                        </tr>
                      </thead>
                      <tbody>                  
                        <tr>
                          <td>Data</td>
                          <td>Data</td>
                          <td>Data2</td>
                          <td>Data</td>
                        </tr>
                        <tr>
                          <td>Data</td>
                          <td>Data</td>
                          <td>Data2</td>
                          <td>Data</td>
                        </tr>
                        <tr>
                          <td>Data</td>
                          <td>Data</td>
                          <td>Data2</td>
                          <td>Data</td>
                        </tr>
                        <tr>
                          <td>Data</td>
                          <td>Data</td>
                          <td>Data2</td>
                          <td>Data</td>
                        </tr>
                      </tbody>
                      <tfoot>
                        <tr>
                         <th class="sort">ID Receta</th>
                          <th class="sort">Nombre</th>
                          <th class="sort">Descripci&oacute;n</th>
                          <th class="sort">Secci&oacute;n</th>
                        </tr>
                      </tfoot>
                    </table>   
                    <?=$usuario?>
 
 
                  </div>
                    <?php
                        ///DATOS A ESTE NIVEL
                     
                    ?>
                    
                    <div id="listado" name="listado"></div>
                
                 </div>
        
        </div>


        <div class="modal fade" id="sugerir" tabindex="-1" role="dialog" aria-labelledby="sugerirModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="sugerirModalLabel">Sugerir receta</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Nombre de receta</label>
                      <input type="text" class="form-control" id="titulo">
                    </div>
                    <div class="form-group">
                      <label for="message-text" class="col-form-label">Ingredientes + Pasos</label>
                      <textarea class="form-control" id="texto" rows="6"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Tu apodo</label>
                      <input type="text" class="form-control" id="apodo">
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="button" class="btn btn-primary">Enviar</button>
                </div>
              </div>
            </div>
          </div>


          <div class="modal fade" id="acerca" tabindex="-1" role="dialog" aria-labelledby="acercaModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="acercaModalLabel">Acerca de Bud&iacute;n</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                 Pagina dedicada a la promoci&oacute;n  y sugerencias de postres dulces!
                </div>
                <div class="modal-footer">
                   <small><i class="fa fa-copyright" aria-hidden="true">Copyright 2022</i></small>
                </div>
              </div>
            </div>
          </div>

          
          <div class="modal fade" id="documentacion" tabindex="-1" role="dialog" aria-labelledby="docuModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="docuModalLabel">Documentaci&oacute;n web</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                     Documentación del sitio<br>
                    <strong>Herramientas</strong>: php, css, html, sql, git
                     <h3>Tablas SQL</h3> 
                     <img class="img-fluid" src="img/tablas.jpg" title="Tablas sql"  alt="Tablas sql"/>
                </div>
                <div class="modal-footer">
                   <small><i class="fa fa-copyright" aria-hidden="true">Copyright 2022</i></small>
                </div>
              </div>
            </div>
          </div>



        
        <script>
 
               $(document).ready( function () {
                      setTimeout(function(){
                        $('table').DataTable({
                    
                        responsive: true
                      });
                        }, 500);

                        $("#listado").hide();
                  } );

         var principalActivo = true;
         var edicion        = "";


            $(".principal").on('click', function(event){
                        $("#principal").show();
                        $("#listado").empty();
                        $("#listado").hide();
                        principalActivo = true;
             });


           function chequearPrincipal(){
                    if(principalActivo){
                    $("#principal").hide();
                    $("#listado").empty();
                    $("#listado").show();
                     principalActivo = false;
                     }
            };          

     $("#edicion").click(function(event) {
         chequearPrincipal();
         $("#listado").load(budines);
        
        });

        

       
         </script>
        <!-- Bootstrap core JS-->
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script type="text/javascript" src="DataTables/datatables.min.js"></script>

        
      </body>
</html>
