<?php
//Conexión a la base de datos
require "../config/conexion.php";
//Llamado a la clase
include "../config/ClassEstudiantes/classEstudiantes_sel.php";

$Estudiantes   = new Estudiantes();
$Lista = $Estudiantes->listarEstudiantes();
//Mensaje
$alert = 'Los datos han sido <strong>Almacenados</strong> corrrectamente';

?>
  <!DOCTYPE html>
  <html lang="es" ng-app>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap núcleo CSS-->
    <link rel="stylesheet" media="screen" href="../assets/bootstrap/themes/Simplex/bootstrap.min.css">
    <!--Biblioteca de iconos monocromáticos y símbolos-->
    <link rel="stylesheet" href="../assets/bootstrap/fonts/glyphicons-pro/css/glyphicons-pro.css">
    <link rel="stylesheet" href="../assets/bootstrap/fonts/font-awesome/css/font-awesome.min.css">
    <!--Paginación, filtrado de registros-->
    <link rel="stylesheet" href="../assets/footable/css/footable.bootstrap.min.css">
    <title>Estudiantes</title>
    <script src="../assets/js/angular.min.js"></script>
  </head>

  <body>
    <div class="container">
      <?php   include "../Plantillas/plantilla_Menu.php";
      /*echo "<pre>";
      print_r($_GET);
      echo "</pre>";*/
      if($_GET != null){?>
        <div class="alert alert-success"><?php echo isset($alert) ? $alert : ''; ?></div>
      <?php } ?>
      <div class="row">
        <div class="col-md-12">
          <h3 class="page-header"><span class="glyphicons glyphicons-group"></span> Estudiantes</h3>
          <ol class="breadcrumb">
            <li><a href="#">Inicio</a></li>
            <li><a href="">Estudiantes</a></li>
            <li class="active">Listado de Estduiantes</li>
          </ol>
          <div class="pull-right">
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
              <a href="New_Estudiantes.php" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-plus"></span> Estudiante Nuevo</a>
            </form>
          </div>
        </div>
      </div>
      </div>
      <div class="row">
        <form id="Con_Area" name="Con_Area" method="post">
          <div class="col-md-8 col-md-offset-2">
             <table class="table table-bordered  table-hover table-striped" id="myTable" name="myTable">
              <thead>
                <div class="input-group">
                  <span class="input-group-addon">
                      <i class="glyphicon glyphicon-search"></i>
                  </span>
                  <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
                </div>
                <tr>
                  <th data-filterable="false">Nro</th>
                  <th data-breakpoints="xs sm">Nombre</th>
                  <th data-breakpoints="xs sm">Apellido</th>
                  <th data-breakpoints="xs sm">Email</th>
                  <th data-breakpoints="xs sm">Estudios</th>
                  <th data-breakpoints="xs sm" data-filterable="false">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $c=1;
                  foreach($Lista as $libro):
                ?>
                <tr>
                <td><?= $c++; ?></td>
                <td><?= $libro->NOMBRE; ?></td>
                <td><?= $libro->APELLIDO; ?></td>
                <td><?= $libro->EMAIL; ?></td>
                <td>
                  <button class="btn-info btn-xs btn-success openBtn" id="ver<?=$c;?>" name="ver<?=$c;?>" data-toggle="modal" data-target="#myModal">Ver</button>
                </td>
                <td>
                  <a href="../Estudios/index.php?a=<?= $libro->ID;?>" class="btn btn-xs btn-success">Agregar Estudio</a>
                  <a href="./Mod_Estudiante.php?m='<?= $libro->ID;?>'" class="btn btn-xs btn-info">Modificar</a>
                </td>
                </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </form>
      </div>
      <!-- Modal POPUP-->
      <div class="row">
        <div class="modal fade" style="display: none" id="myModal" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Estudios.</h4>
              </div>
              <div class="modal-body">
                <table class="table table-bordered  table-hover table-striped">
                  <thead>
                    <tr>
                      <th data-filterable="false">Nro</th>
                      <th data-breakpoints="xs sm">Nombre</th>
                      <th data-breakpoints="xs sm">Universidad</th>
                      <th data-breakpoints="xs sm">Año</th>
                      <th data-breakpoints="xs sm" data-filterable="false">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Remember to include jQuery :) -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
      <script src="../assets/js/plugins/jquery/jquery-3.2.1.min.js"></script>
      <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
      <script src="../assets/footable/js/footable.min.js"></script>
      <script src="../assets/footable/js/configTable.js"></script>
      <script type="text/javascript">
        $('.openBtn').on('click',function(){
          console.clear();
          console.log("Ingresamos");
          $('.modal-body').load('getContent.php?id=1',function(){
            $('#myModal').modal({show:true});
          });
        });
      </script>
      <script>
        function myFunction() {
          // Declare variables 
          var input, filter, table, tr, td, i, j, visible;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");
          // Loop through all table rows, and hide those who don't match the search query
          for (i = 0; i < tr.length; i++) {
            visible = false;
            /* Obtenemos todas las celdas de la fila, no sólo la primera */
            td = tr[i].getElementsByTagName("td");
            for (j = 0; j < td.length; j++) {
              if (td[j] && td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                visible = true;
              }
            }
            if (visible === true) {
              tr[i].style.display = "";
            } else {
              tr[i].style.display = "none";
            }
          }
        }
      </script>
</body>
</html>