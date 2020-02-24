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
</head>
<body>

<div class="container">
    <?php   include "../Plantillas/plantilla_Menu.php"; ?>
    <div class="row">
      <div class="col-md-12">
        <h3 class="page-header"><span class="glyphicons glyphicons-group"></span> Estudiantes</h3>
        <ol class="breadcrumb">
          <li><a href="#">Inicio</a></li>
          <li><a href="index.php">Estudiantes</a></li>
          <li class="active">Nuevo Estudiante</li>
        </ol>
      </div>
    </div>
    <!-- Formulario -->
    <form method="post" autocomplete="off" id="frm" action="../config/ClassEstudiantes/classEstudiantes_Ins.php">
      <div class="row">
        <div class="col-md-4">
          <label for="email">Nombre:</label>
        </div>
        <div class="col-md-8">
          <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="form-control" maxlength="60" require>
          <span class="help-block" id="error"></span>
        </div>
        <div class="col-md-4">
          <label for="email">Apellido:</label>
        </div>
        <div class="col-md-8">
          <input type="text" name="apellido" id="apellido" placeholder="Apellido" class="form-control" maxlength="60" require>
          <span class="help-block" id="error"></span>
        </div>
        <div class="col-md-4">
          <label for="email">Email:</label>
        </div>
        <div class="col-md-8">
          <input type="email" name="email" id="email" placeholder="Email" class="form-control" maxlength="120" require>
          <span class="help-block" id="error"></span>
        </div>
      </div>
      <div><br>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>
        <!--<a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Guardar</a>-->
      </div>
    </form>
  </div>
  <!-- LIBRERIAS validadoras-->
  <script src="../assets/js/plugins/jquery/jquery-3.2.1.min.js"></script>
  <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
  <!-- Plugin para la validación de formularios -->
  <script src="../assets/jquery_validation/dist/jquery.validate.min.js"></script>
  <script src="../assets/jquery_validation/dist/localization/messages_es.js"></script>
  <!-- Plugin para listado, navegación y filtrado en tablas -->
  <script src="../assets/footable/js/footable.min.js"></script>
  <script src="../assets/footable/js/configTable.js"></script>
</body>

</html>
