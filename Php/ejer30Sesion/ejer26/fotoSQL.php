<?php
define("SERVER","b9ovwmwcthrjvqamalfl-mysql.services.clever-cloud.com");
define("USUARIO","ujvmkkxz9vqhyrky");
define("PASS","DnGSpIXkhjULk2U1YUz8");
define("BASE","b9ovwmwcthrjvqamalfl");

$mysqli = new mysqli(SERVER,USUARIO,PASS,BASE);

require('../controlSesion.php');

$mysqliQuery = "select foto from listausuarios2 where legajo = ?";

$likeLegajo = $_POST['codigo'];

if ($sentencia = $mysqli->prepare($mysqliQuery)) {
  if ($sentencia->bind_param("s", $likeLegajo)) {
    if ($sentencia->execute()) {

    $respuesta = $sentencia->get_result();

    while ($fila = $respuesta->fetch_assoc()) {

      $legajo = base64_encode($fila['foto']);

    }

    }
  }
}

$mysqli->close();

echo json_encode($legajo,JSON_INVALID_UTF8_SUBSTITUTE);
 ?>
