<?php
define("SERVER","b9ovwmwcthrjvqamalfl-mysql.services.clever-cloud.com");
define("USUARIO","ujvmkkxz9vqhyrky");
define("PASS","DnGSpIXkhjULk2U1YUz8");
define("BASE","b9ovwmwcthrjvqamalfl");

$mysqli = new mysqli(SERVER,USUARIO,PASS,BASE);

require('../controlSesion.php'); //Verifica que la sesion este iniciada

// .php depreciado. Eliminar?...


$mysqliQuery="insert into listausuarios2 (apellido, Fecha, inscripto, legajo, Promedio, nombre, estado) values (?,?,?,?,?,?,?)";

$likeNombre= "%".$_POST['nombre']."%";
$likeApellido= "%".$_POST['apellido']."%";
$likeFecha= "%".$_POST['fecha']."%";
$likeInscripto= "%".$_POST['inscripto']."%";
$likeLegajo= "%".$_POST['legajo']."%";
$likePromedio= "%".$_POST['promedio']."%";
//$likeFoto= "%".$_POST['foto']."%";
$likeId= "%".$_POST['id']."%";
$likeEstado= "%".$_POST['estado']."%";

if ($sentencia = $mysqli->prepare($sql)) {
  if($sentencia->bind_param("ssssssss", $likeNombre, $likeApellido, $likeFecha, $likeInscripto, $likeLegajo, $likePromedio, $likeId, $likeEstado)){
    if($sentencia->execute()){
      echo "Todo salio bien";;
    }else {
      echo mysqli->error;
      echo mysqli->errorno;
    }
  }else {
    echo "El bind salio mal";
  }
}
else {
  echo "El prepare salio mal";
}
$mysqli->close();
 ?>
