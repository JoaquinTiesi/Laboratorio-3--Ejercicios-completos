<?php
define("SERVER","b9ovwmwcthrjvqamalfl-mysql.services.clever-cloud.com");
define("USUARIO","ujvmkkxz9vqhyrky");
define("PASS","DnGSpIXkhjULk2U1YUz8");
define("BASE","b9ovwmwcthrjvqamalfl");

$mysqli = new mysqli(SERVER,USUARIO,PASS,BASE);

require('../controlSesion.php'); //Verifica que la sesion este iniciada

$mysqliQuery = "select foto from listausuarios2 where id = ?";

$likeLegajo = $_POST['codigo'];

if ($sentencia = $mysqli->prepare($mysqliQuery)) {
  if ($sentencia->bind_param("s", $likeLegajo)) {
    if ($sentencia->execute()) {

    $respuesta = $sentencia->get_result();

    while ($fila = $respuesta->fetch_assoc()) {

      $legajo = base64_encode($fila['foto']); //Selecciona la imagen correcta en base al ID en la base de datos y la envia para mostrar

    }

    }
  }
}

$mysqli->close();

echo json_encode($legajo,JSON_INVALID_UTF8_SUBSTITUTE);
 ?>
