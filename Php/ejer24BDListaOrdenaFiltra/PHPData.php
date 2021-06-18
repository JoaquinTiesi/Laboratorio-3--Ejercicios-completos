<?php
require("datosConexionBase.inc");
//$sql = "select * from listausuarios order by ".$_POST['orden'];
//$sql = "select * from listausuarios order by orden DESC";

$sql = "select * from listausuarios where ";
$sql=$sql."nombre LIKE ? and ";
$sql=$sql."apellido LIKE ? and ";
$sql=$sql."fecha LIKE ? and ";
$sql=$sql."inscripto LIKE ? and ";
$sql=$sql."legajo LIKE ? and ";
$sql=$sql."promedio LIKE ? and ";
$sql=$sql."foto LIKE ? and ";
$sql=$sql."id LIKE ? and ";
$sql=$sql."order by ".$_POST['orden'];


if (( $resultado = $mysqli->query($sql))) { //devuelve obj $resultado
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
 ?>
