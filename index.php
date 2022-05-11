<?php
 header("Access-Control-Allow-Origin: *"); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Bud&iacute;n</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>-->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" crossorigin="anonymous">
        <script src="js/jquery.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light principal">Bud&iacute;n</div>
                <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3 principal"  href="#">Lo ultimo! <i class="fa fa-calendar-check-o"></i></a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 budines" id="budines" href="#">Budines & Tortas</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 cupcakes" id="cupcakes"  href="#">Cupcakes</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 vasitos" id="vasitos"   href="#">Vasitos</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 dimension" id="dimension" href="#">De otra dimensi&oacute;n <i class="fa fa-heartbeat"></i></a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 combina" id="combina"   href="#">Combina los ingrendientes!</a>

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
                                 <li class="nav-item"><a class="nav-link" href="#!">Lo + visto!</a></li> 
                                 <li class="nav-item dropdown"> 
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</a> 
                                   <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown"> 
                                        <a class="dropdown-item" data-toggle="modal" data-target="#sugerir" href="#" id="sugerencia">Sugerir receta</a> 
                                       <div class="dropdown-divider"></div>
                                      <a class="dropdown-item" data-toggle="modal" data-target="#acerca" href="#">Acerca de Budin</a> 
                                </div> 
                                 </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
                    <div id="principal" name="principal">
                        <h2 class="mt-4">Lista de recetas</h2>
                        <br>
                        <p>Receta 1</p>
                        <p>... </p>

                        </p>
                    </div>
                    
                    <div id="listado" name="listado"></div>
                
                 </div>
        
        </div>


        <div class="modal fade" id="sugerir" tabindex="-1" role="dialog" aria-labelledby="sugerirModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
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
                      <label for="recipient-name" class="col-form-label">Apodo</label>
                      <input type="text" class="form-control" id="titulo">
                    </div>
                    <div class="form-group">
                      <label for="message-text" class="col-form-label">Ingredientes + Pasos</label>
                      <textarea class="form-control" id="texto" rows="6"></textarea>
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



        
        <script>
 
         var principalActivo = true;
         var budines         = "budines.php";
         var combina         = "combina.php";
         var cupcakes        = "cupcakes.php"; 
         var dimension       = "dimension.php";    
         var vasitos         = "vasitos.php"               

        $(document).ready(function() {
            $("#listado").hide();
         
            });


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

     $("#budines").click(function(event) {
         chequearPrincipal();
         $("#listado").load(budines);
        
        });

        $("#combina").click(function(event) {
         chequearPrincipal();
        $("#listado").load(combina);
         
        });

        $("#cupcakes").click(function(event) {
         chequearPrincipal();
        $("#listado").load(cupcakes);
         
        });

        $("#dimension").click(function(event) {
         chequearPrincipal();
        $("#listado").load(dimension);
         
        });

        $("#vasitos").click(function(event) {
         chequearPrincipal();
        $("#listado").load(vasitos);
         
        });

       $("#sugerencia").click(function(event) {
           // $('#').val("GeeksForGeeks");
           console.log("nuevo registro en accion");
        });

        

       
         </script>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
