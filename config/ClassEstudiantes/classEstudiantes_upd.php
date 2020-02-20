<?php
require('../conexion.php');
//capturamos
$nombre= $_POST['nombre'];
$apellido= $_POST['apellido'];
$email= $_POST['email'];
$id= $_POST['id'];
//Validamos que el metodo POST este enviando datos.
if ($_POST != "" ){
  try{
    $Con= new DataBase();
    $Conexion= $Con->Conexion();
    $query = "UPDATE tredasolutions.estudiante 
              SET NOMBRE= '$nombre', APELLIDO = '$apellido', EMAIL = '$email' 
              WHERE ID = $id";
    // echo "<pre>";
    // print_r($query);
    // echo "</pre>";
    // exit;
    $Conexion->query($query);
    echo "<script>alert('¡Se almaceno correctamente.!');</script>";
    header("Location: ../../Estudiantes/index.php?c=1");
  }
  catch ( PDOException $e ){
    die("Ha ocurrido un error inesperado en la base de datos.<br>".$e->getMessage());
    echo "Por favor revisar los datos que se estan insertando.";
  }
}
//si no esta enviando datos, nos notifica por un scritp y nos muestra que nos trae.
else{
  echo "<script>alert('¡Por favor revisar los datos ingresados, estos no pueden estar vacíos! ');</script>";
  die('<h1>Por favor regrese a la pagina anterior y termine de ingresar datos.</h1>');
   // echo '<input type="hidden" id="error" name="error">'
  header("Location:../../admin/preguntas/Con_preguntas.php");
}

?>