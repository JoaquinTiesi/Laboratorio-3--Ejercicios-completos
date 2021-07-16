<?php

require('../controlSesion.php'); //Verifica que la sesion este iniciada

define("SERVER","b9ovwmwcthrjvqamalfl-mysql.services.clever-cloud.com");
define("USUARIO","ujvmkkxz9vqhyrky");
define("PASS","DnGSpIXkhjULk2U1YUz8");
define("BASE","b9ovwmwcthrjvqamalfl");

$mysqli = new mysqli(SERVER,USUARIO,PASS,BASE);

$mysqliQuery = "select * from listausuarios2 where id = ?";

$postLegajo = $_POST['codigo'];

if($sentencia = $mysqli -> prepare($mysqliQuery)){
  if($sentencia -> bind_param("s", $postLegajo)){
    if($sentencia -> execute()){

      $respuesta = $sentencia->get_result();

      while ($fila = $respuesta->fetch_assoc()) {
        $objArticulo = new stdClass();
        $objArticulo->codnombre=$fila['nombre'];
        $objArticulo->codapellido=$fila['apellido'];
        $objArticulo->codfecha=$fila['Fecha'];
        $objArticulo->codinscripto=$fila['inscripto'];
        $objArticulo->codlegajo=$fila['legajo'];
        $objArticulo->codpromedio=$fila['Promedio'];
        //$objArticulo->codfoto= base64_encode($fila['foto']); //El encodeado no funciona el chrome?
        $objArticulo->codid=$fila['id'];
        $objArticulo->codestado=$fila['estado'];

        echo json_encode($objArticulo,JSON_INVALID_UTF8_SUBSTITUTE); //devuelve la informacion de la tabla correspondiente en base al ID
      }

      $mysqli->close();
    }else {
      echo $mysqli->error;
      echo $mysqli->errorno;
    }
  }else {
    echo $mysqli->error;
    echo $mysqli->errorno;
  }
}else {
  echo $mysqli->error;
}
 ?>
