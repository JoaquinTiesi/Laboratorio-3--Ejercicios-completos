<?php
require("datosConexionBase.inc");
//$sql = "select * from listausuarios order by ".$_POST['orden'];
//$sql = "select * from listausuarios order by orden DESC";

$sql = "select * from listausuarios where ";
$sql=$sql."nombre LIKE ? and ";
$sql=$sql."apellido LIKE ? and ";
$sql=$sql."Fecha LIKE ? and ";
$sql=$sql."inscripto LIKE ? and ";
$sql=$sql."legajo LIKE ? and ";
$sql=$sql."Promedio LIKE ? and ";
//$sql=$sql."foto-carnet LIKE ? and ";
$sql=$sql."id LIKE ? ";
$sql=$sql."order by ".$_POST['orden'];

$likeNombre= "%".$_POST['nombre']."%";
$likeApellido= "%".$_POST['apellido']."%";
$likeFecha= "%".$_POST['fecha']."%";
$likeInscripto= "%".$_POST['inscripto']."%";
$likeLegajo= "%".$_POST['legajo']."%";
$likePromedio= "%".$_POST['promedio']."%";
$likeFoto= "%".$_POST['foto']."%";
$likeId= "%".$_POST['id']."%";



if ($sentencia = $mysqli->prepare($sql)) { //devuelve obj $resultado
  if($sentencia->bind_param("sssssss", $likeNombre, $likeApellido, $likeFecha, $likeInscripto, $likeLegajo, $likePromedio, $likeId)){
    if($sentencia->execute()){
      $resultado = $sentencia->get_result();
      $resultadoCuentaRegistros = $resultado->num_rows;
      $articulos=[];
      while($fila=$resultado->fetch_assoc()) {
      $objArticulo = new stdClass();
      $objArticulo->codnombre=$fila['nombre'];
      $objArticulo->codapellido=$fila['apellido'];
      $objArticulo->codfecha=$fila['Fecha'];
      $objArticulo->codinscripto=$fila['inscripto'];
      $objArticulo->codlegajo=$fila['legajo'];
      $objArticulo->codpromedio=$fila['Promedio'];
      $objArticulo->codfoto=$fila['foto-carnet'];
      $objArticulo->codid=$fila['id'];
      array_push($articulos,$objArticulo);
      }
      $objArticulos = new stdClass();
      $objArticulos->usuario=$articulos;
      $objArticulos->cuenta=$resultadoCuentaRegistros;
      $salidaJson = json_encode($objArticulos);
      $mysqli->close();
      echo $salidaJson;

      die();
    }
  }
}
else {
  echo $mysqli->error;
}
 ?>
