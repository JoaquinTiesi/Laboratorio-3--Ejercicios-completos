<?php
require("datosConexionBase.inc");

$mysqliQuery="insert into listausuarios2 (apellido, Fecha, inscripto, legajo, Promedio, foto, nombre, estado) values (?,?,?,?,?,?,?,?)"

$likeNombre= "%".$_POST['nombre']."%";
$likeApellido= "%".$_POST['apellido']."%";
$likeFecha= "%".$_POST['fecha']."%";
$likeInscripto= "%".$_POST['inscripto']."%";
$likeLegajo= "%".$_POST['legajo']."%";
$likePromedio= "%".$_POST['promedio']."%";
$likeFoto= "%".$_POST['foto']."%";
$likeId= "%".$_POST['id']."%";
$likeEstado= "%".$_POST['estado']."%";

if ($sentencia = $mysqli->prepare($sql)) {
  if($sentencia->bind_param("sssssssss", $likeNombre, $likeApellido, $likeFecha, $likeInscripto, $likeLegajo, $likePromedio,$likeFoto, $likeId, $likeEstado)){
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
