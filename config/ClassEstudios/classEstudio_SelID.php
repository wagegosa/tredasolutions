<?php  
$verId = $_GET['verId'];
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
    while ($row = mysqli_fetch_array($result)) {
      echo "<td>".$row['ID']."</td>";
      echo "<td>".$row['NOMBREESTUDIO']."</td>";
      echo "<td>".$row['UNIVERSIDAD']."</td>";
      echo "<td>".$row['ANIO']."</td>";
      echo "<td>".$row['ESTUDIANTE']."</td>";
    }
  } else {
    echo "<tr>No hay registros de estudios para este estudiante</tr>";
    // echo "<pre>";
    // print_r($result);
    // echo "</pre>";
    // exit;
  }
  
}

?>