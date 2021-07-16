<?php
define("SERVER","b9ovwmwcthrjvqamalfl-mysql.services.clever-cloud.com");
define("USUARIO","ujvmkkxz9vqhyrky");
define("PASS","DnGSpIXkhjULk2U1YUz8");
define("BASE","b9ovwmwcthrjvqamalfl");

$mysqli = new mysqli(SERVER,USUARIO,PASS,BASE);

require('../controlSesion.php');

$mysqliQuery = "update listausuarios2 set nombre=?, apellido=?, fecha=?, inscripto=?, legajo=?, promedio=?, foto=?, estado=? where id=?";

$likeNombre= $_POST['nombre'];
$likeApellido= $_POST['apellido'];
$likeFecha= $_POST['fecha'];
$likeInscripto= $_POST['inscripto'];
$likeLegajo= $_POST['legajo'];
$likePromedio= $_POST['promedio'];
$imagen = file_get_contents($_FILES['foto']['tmp_name']);
$likeEstado= $_POST['estado'];
$likeIDString= $_POST['id'];

if ($sentencia = $mysqli->prepare($mysqliQuery)) {
  if($sentencia->bind_param("sssisssss", $likeNombre, $likeApellido, $likeFecha, $likeInscripto, $likeLegajo, $likePromedio, $imagen, $likeEstado, $likeIDString)){
    if($sentencia->execute()){
      $objArticulo = new stdClass();
      $objArticulo->nombre = $likeNombre;
      $objArticulo->apellido = $likeApellido;
      $objArticulo->fecha = $likeFecha;
      $objArticulo->inscripto = $likeInscripto;
      $objArticulo->legajo = $likeLegajo;
      $objArticulo->promedio = $likePromedio;
      $objArticulo->imagen = $imagen;
      $objArticulo->estado = $likeEstado;

      echo json_encode($objArticulo);

    }else {
      $objRTA = new stdClass();
      $objRTA->stringDeError = "Error número: " . $mysqli->errno . "<br/>Detalles: <br/>" . $mysqli->error;

      echo json_encode($objRTA);
    }
  }else {
    $objRTA = new stdClass();
    $objRTA->stringDeError = "Error número: " . $mysqli->errno . "<br/>Detalles: <br/>" . $mysqli->error;

    echo json_encode($objRTA);
  }
}else {
  $objRTA = new stdClass();
  $objRTA->stringDeError = "Error número: " . $mysqli->errno . "<br/>Detalles: <br/>" . $mysqli->error;

  echo json_encode($objRTA);
}

$mysqli->close();
 ?>
