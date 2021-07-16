<?php
define("SERVER","b9ovwmwcthrjvqamalfl-mysql.services.clever-cloud.com");
define("USUARIO","ujvmkkxz9vqhyrky");
define("PASS","DnGSpIXkhjULk2U1YUz8");
define("BASE","b9ovwmwcthrjvqamalfl");

$mysqli = new mysqli(SERVER,USUARIO,PASS,BASE);

require('../controlSesion.php'); //Verifica que la sesion este iniciada

//$sql = "select * from listausuarios order by ".$_POST['orden'];
//$sql = "select * from listausuarios order by orden DESC";

//$mysqliQuery="insert into listausuarios2 (apellido, Fecha, inscripto, legajo, Promedio, foto, nombre, estado) values (?,?,?,?,?,?,?,?)";

$sql = "select * from listausuarios2 where ";
$sql=$sql."nombre LIKE ? and ";
$sql=$sql."apellido LIKE ? and ";
$sql=$sql."Fecha LIKE ? and ";
$sql=$sql."inscripto LIKE ? and ";
$sql=$sql."legajo LIKE ? and ";
$sql=$sql."Promedio LIKE ? and ";
$sql=$sql."id LIKE ? and ";
//$sql=$sql."foto LIKE ? and ";
$sql=$sql."estado LIKE ? ";
$sql=$sql."order by ".$_POST['orden'];

$likeNombre= "%".$_POST['nombre']."%";
$likeApellido= "%".$_POST['apellido']."%";
$likeFecha= "%".$_POST['fecha']."%";
$likeInscripto= "%".$_POST['inscripto']."%";
$likeLegajo= "%".$_POST['legajo']."%";
$likePromedio= "%".$_POST['promedio']."%";
$likeFoto= "%".$_POST['foto']."%";
$likeId= "%".$_POST['id']."%";
$likeEstado= "%".$_POST['estado']."%";


//$likeFoto,
if ($sentencia = $mysqli->prepare($sql)) { //devuelve obj $resultado
  if($sentencia->bind_param("ssssssss", $likeNombre, $likeApellido, $likeFecha, $likeInscripto, $likeLegajo, $likePromedio, $likeId, $likeEstado)){
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
      //$objArticulo->codfoto=$fila['foto'];
      $objArticulo->codid=$fila['id'];
      $objArticulo->codestado=$fila['estado'];
      array_push($articulos,$objArticulo);
      }
      $objArticulos = new stdClass();
      $objArticulos->usuario=$articulos;
      $objArticulos->cuenta=$resultadoCuentaRegistros;
      $salidaJson = json_encode($objArticulos);
      $mysqli->close();
      echo $salidaJson; //Obtiene la informacion de la base de datos y la envia a las tablas

      die();
    }
  }
}
else {
  echo $mysqli->error;
}
 ?>
