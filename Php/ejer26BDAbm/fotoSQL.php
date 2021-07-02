<?php
require("datosConexionBase.inc");

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
