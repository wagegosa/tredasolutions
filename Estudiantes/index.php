<?php
//Conexión a la base de datos
require "../config/conexion.php";
//Llamado a la clase
include "../config/ClassEstudiantes/classEstudiantes_sel.php";

$Conductor   = new Conductor();
$Lista = $Conductor->listarConductor();


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
    <title></title>
    <script src="../assets/js/angular.min.js"></script>
  </head>

  <body>
    <div class="container">
      <?php   include "../Plantillas/plantilla_Menu.php"; ?>
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
              <a href="New_Conductor.php" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-plus"></span> Estudiante Nuevo</a>
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
              <td><?= $libro->ID; ?></td>
              <td><?= $libro->NOMBRE; ?></td>
              <td><?= $libro->APELLIDO; ?></td>
              <td><?= $libro->EMAIL; ?></td>
              <td>
                <input type="hidden" name="id" id="id" value="<?= $libro->ID;?>">
                <a href="" class="btn btn-primary btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
              </td>
              </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
        </form>
      </div>

      <script src="../assets/js/plugins/jquery/jquery-3.2.1.min.js"></script>
      <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
      <script src="../assets/footable/js/footable.min.js"></script>
      <script src="../assets/footable/js/configTable.js"></script>

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
