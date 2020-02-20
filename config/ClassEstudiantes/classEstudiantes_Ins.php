<?php
 //llamamos a la connecion
require('../conexion.php');
//capturamos
$nombre= $_POST['nombre'];
$apellido= $_POST['apellido'];
$email= $_POST['email'];
/*echo "<pre>";
print_r($_POST);
echo "</pre>";
die;*/
//Validamos que el metodo POST este enviando datos.
if ($nombre != "" ){
  try{
    $Con= new DataBase();
    $Conexion= $Con->Conexion();
    $sql = "INSERT INTO tredasolutions.estudiante(NOMBRE, APELLIDO, EMAIL) 
        VALUES ('$nombre', '$apellido', '$email');";
    //echo "querry: ".$sql."<br>";
    //exit();
    $Conexion->query($sql);
    header("Location:../../Estudiantes/index.php?c=1");
  }
  catch ( PDOException $e ){
    die("Ha ocurrido un error inesperado en la base de datos.<br>".$e->getMessage());
    echo "Por favor revisar los datos que se estan insertando.";
  }
}
//si no esta enviando datos, nos notifica por un scritp y nos muestra que nos trae.
else{
  echo "<script>alert('¡Por favor revisar los datos ingresados, estos no pueden estar vacíos! ');</script>";
  exit();
  header("Location:../../Area/Con_Area.php");
}
?>