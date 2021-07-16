<?php
define("SERVER","b9ovwmwcthrjvqamalfl-mysql.services.clever-cloud.com");
define("USUARIO","ujvmkkxz9vqhyrky");
define("PASS","DnGSpIXkhjULk2U1YUz8");
define("BASE","b9ovwmwcthrjvqamalfl");

require('../controlSesion.php'); //Verifica que la sesion este iniciada

$mysqli = new mysqli(SERVER,USUARIO,PASS,BASE);

$mysqliQuery = "delete from listausuarios2 where id = ?";

$postLegajo = $_POST['codigo'];

if($sentencia = $mysqli -> prepare($mysqliQuery)){
  if($sentencia -> bind_param("s", $postLegajo)){
    if($sentencia -> execute()){
      echo "Todo salio bien"; //Elimina la informacion correspondiente en la base de datos en base al ID
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
  echo $mysqli->errorno;
}
 ?>
