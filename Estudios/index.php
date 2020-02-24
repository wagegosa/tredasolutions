<?php
//Conexión a la base de datos
require "../config/conexion.php";

$Con= new DataBase();
$Conn= $Con->Conexion();

$_GET['a'] ? $_GET['a'] : '';
$id = $_GET['a'];
try {
    $query="SELECT ID, NOMBRE FROM tredasolutions.estudiante WHERE ID = ".$id;
    // echo "<pre>";
    // print_r($query);
    // echo "</pre>";
    // exit;
    $Resul= $Conn->prepare($query);
    $Resul->bindParam(':id', $id);
    $Resul->execute();
    $Resul->setFetchMode(PDO::FETCH_ASSOC);
    // $Resul->setFetchMode(PDO::FETCH_ASSOC);
    $Resultado= $Resul->rowCount();
  
    if($Resultado!=0){
      while ($R= $Resul->fetch()):
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Bootstrap núcleo CSS-->
  <link rel="stylesheet" media="screen" href="../assets/bootstrap/themes/Simplex/bootstrap.min.css">
  <!--Biblioteca de iconos monocromáticos y símbolos-->
  <link rel="stylesheet" href="../assets/bootstrap/fonts/glyphicons-pro/css/glyphicons-pro.css">
  <link rel="stylesheet" href="../assets/bootstrap/fonts/font-awesome/css/font-awesome.min.css">
  <!--Paginación, filtrado de registros-->
  <link rel="stylesheet" href="../assets/footable/css/footable.bootstrap.min.css">
  <title>Estudios</title>
</head>
<body>
  <div class="container">
    <?php   include "../Plantillas/plantilla_Menu.php"; ?>
    <div class="row">
      <div class="col-md-12">
        <h3 class="page-header"><span class="glyphicons glyphicons-group"></span> Estudios</h3>
        <ol class="breadcrumb">
          <li><a href="#">Inicio</a></li>
          <li><a href="">Estudios</a></li>
          <li class="active">Nuevo Estudio</li>
        </ol>
      </div>
    </div>
    <!-- Formulario -->
    <form method="post" autocomplete="off" id="frm" action="../config/ClassEstudios/classEstudio_Ins.php">
      <div class="row">
        <div class="col-md-4">
          <label for="email">Estudiante:</label>
        </div>
        <div class="col-md-8">
          <input type="text" name="estudiante" id="estudiante" placeholder="Estudiante" class="form-control" maxlength="120" value="<?= $R['NOMBRE']?>" require>
          <span class="help-block" id="error"></span>
        </div>
        <div class="col-md-4">
          <label for="email">Nombre:</label>
        </div>
        <div class="col-md-8">
          <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="form-control" maxlength="120" require>
          <span class="help-block" id="error"></span>
        </div>
        <div class="col-md-4">
          <label for="email">Universidad:</label>
        </div>
        <div class="col-md-8">
          <input type="text" name="universidad" id="universidad" placeholder="Universidad" class="form-control" maxlength="120" require>
          <span class="help-block" id="error"></span>
        </div>
        <div class="col-md-4">
          <label for="email">Año:</label>
        </div>
        <div class="col-md-8">
          <input type="number" name="anio" id="anio" placeholder="Año" class="form-control" maxlength="120" min="1980" max="2020" require>
          <span class="help-block" id="error"></span>
        </div>
      </div>
      <div><br>
        <input type="hidden" name="id" id="id" value="<?= $R['ID']; ?>">
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
<?php    
    endwhile;
  }else{
    echo "No se encontraron registros con el ID " .$idEmpleado;
  }
} catch (PDOException $e) {
  die("Error occurred:" . $e->getMessage());
}