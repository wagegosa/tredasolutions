<?php  
require '../conexion.php';
echo "<pre>";
print_r($_GET);
echo "</pre>";

if(!empty($_GET['id'])){
    //get content from database
    $query = $db->query("A.ID, A.NOMBREESTUDIO, A.UNIVERSIDAD, A.ANIO, CONCAT(B.NOMBRE, " ",B.APELLIDO) AS ESTUDIANTE
                         FROM tredasolutions.estudios A
                         INNER JOIN tredasolutions.estudiante B ON (A.Estudiante = B.ID)
                        WHERE Estudiante = {$_GET['id']}");
    if($query->num_rows > 0){
        $cmsData = $query->fetch_assoc();
        echo '<h4>'.$cmsData['NOMBREESTUDIO'].'</h4>';
        echo '<h4>'.$cmsData['UNIVERSIDAD'].'</h4>';
        echo '<h4>'.$cmsData['ANIO'].'</h4>';
        echo '<h4>'.$cmsData['ESTUDIANTE'].'</h4>';
    }else{
        echo 'Content not found....';
    }
}else{
    echo 'Content not found....';
}

// if(isset($_POST["employee_id"]))  
// {  
//   $output = '';  
//   $connect = mysqli_connect("localhost", "root", "", "testing");  
//   $query = "SELECT A.ID, A.NOMBREESTUDIO, A.UNIVERSIDAD, A.ANIO, A.Estudiante 
//             FROM tredasolutions.estudios A
//             INNER JOIN tredasolutions.estudiante B ON (A.Estudiante = B.ID)
//             WHERE Estudiante = '".$_POST["employee_id"]."'";  
//   $result = mysqli_query($connect, $query);  
//   $output .= '  
//   <div class="table-responsive">  
//   <table class="table table-bordered">';  
//   while($row = mysqli_fetch_array($result))  
//   {  
//    $output .= '  
//    <td width="70%">'.$row["NOMBREESTUDIO"].'</td>  
//    <td width="70%">'.$row["UNIVERSIDAD"].'</td>  
//    <td width="70%">'.$row["ANIO"].'</td>
//    <td width="70%">'.$row["ANIO"].'</td> 
//    ';  
//  }  
//  $output .= '  
//  </table>  
//  </div>  
//  ';  
//  echo $output;  
// }  
?>