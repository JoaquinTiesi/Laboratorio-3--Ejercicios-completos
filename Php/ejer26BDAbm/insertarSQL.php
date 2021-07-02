<?php
require("datosConexionBase.inc");

$mysqliQuery = "insert into listausuarios2 (nombre, apellido, fecha, inscripto, legajo, promedio, foto, estado) values (?,?,?,?,?,?,?,?)";

$likeNombre=$_POST['nombre'];
$likeApellido=$_POST['apellido'];
$likeFecha= $_POST['fecha'];
$likeInscripto=$_POST['inscripto'];
$likeLegajo=$_POST['legajo'];
$likePromedio=$_POST['promedio'];
$imagen = file_get_contents($_FILES['foto']['tmp_name']);
$likeEstado=$_POST['estado'];

if ($sentencia = $mysqli->prepare($mysqliQuery)) {
  if($sentencia->bind_param("ssssssss", $likeNombre, $likeApellido, $likeFecha, $likeInscripto, $likeLegajo, $likePromedio, $imagen, $likeEstado)){
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
