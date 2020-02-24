<?php  
$verId = $_POST['verId'];
if ($verId != null) {
  //Servidor de la Base de datos.
  $svr = "localhost";
  //Usuario del Servidor de la Base de datos.
  $usr = "root";
  //Contraseña del Usuario de la Base de datos.
  $pwd = "";
  //Nombre de la Base de datos.
  $dbh = "tredasolutions";
  //Enlace con la base de datos MySQL
  $dbCon;
  $db = new mysqli($svr, $usr, $pwd, $dbh);
  if($db->connect_error){
    die("Unable to connect database: " . $db->connect_error);
  }
  $query = "SELECT A.ID, A.NOMBREESTUDIO, A.UNIVERSIDAD, A.ANIO, 
        CONCAT(B.NOMBRE, ' ',B.APELLIDO) AS ESTUDIANTE 
        FROM tredasolutions.estudios A 
        INNER JOIN tredasolutions.estudiante B ON (A.Estudiante = B.ID) 
        WHERE A.Estudiante = $verId";
  $result = mysqli_query($db, $query);
  if ($result != null) {
    echo "<table class='table table-bordered  table-hover table-striped'>";
      echo "<thead>";
        echo "<tr>";
          echo "<th data-filterable'='false'>Nro</th>";
          echo "<th data-breakpoints='xs sm'>Nombre</th>";
          echo "<th data-breakpoints='xs sm'>Universidad</th>";
          echo "<th data-breakpoints='xs sm'>Año</th>";
          echo "<th data-breakpoints='xs sm'>Estudiante</th>";
          echo "<th data-breakpoints='xs sm' data-filterable='false'>Acciones</th>";
        echo "</tr>";
      echo "</thead>";
      echo "<tbody class='table-info' >";
      while ($row = mysqli_fetch_array($result)) {
        echo "<td>".$row['ID']."</td>";
        echo "<td>".$row['NOMBREESTUDIO']."</td>";
        echo "<td>".$row['UNIVERSIDAD']."</td>";
        echo "<td>".$row['ANIO']."</td>";
        echo "<td>".$row['ESTUDIANTE']."</td> <br><br>";
        echo "<td>";
          echo "<a href='./Mod_Estudiante.php?m=".$row['ID']." class='btn btn-lg btn-warning' role='button'><span class='glyphicon glyphicon-pencil'></span></a>";
        echo "</td>";
      }
      echo "</tbody>";
    echo "</table>";
  } else {
    echo "<h1>No hay registros de estudios para este estudiante</h1>";
    echo "<pre>";
    print_r($result);
    echo "</pre>";
    exit;
  }
  
}

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

</body>
</html>