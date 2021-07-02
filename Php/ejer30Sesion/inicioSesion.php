<?php
if (!autenticar($_POST['usuario'], $_POST['contrasenia'])) {
  header("Location: ./inicio.html");
}else {
  session_start();

  $_SESSION['idSesion'] = session_id();

  $_SESSION['sessionLogin'] = $_POST['usuario'];

  header("Location: ./ejer26/index.php");
}

function autenticar($usuario, $contrasenia){

  define("SERVER","b9ovwmwcthrjvqamalfl-mysql.services.clever-cloud.com");
  define("USUARIO","ujvmkkxz9vqhyrky");
  define("PASS","DnGSpIXkhjULk2U1YUz8");
  define("BASE","b9ovwmwcthrjvqamalfl");

  $mysqli = new mysqli(SERVER,USUARIO,PASS,BASE);

  $mysqliQuery = "select * from listainicio where usuario = ? and contrasenia = ?";

  if ($sentencia = $mysqli->prepare($mysqliQuery)) {
    if ($sentencia->bind_param("si", $usuario, $contrasenia)) {
      if ($sentencia->execute()) {
        $respuesta = $sentencia->get_result();

        $totalFilas = $respuesta->num_rows;

        if ($totalFilas == 1) {
          return true;
        }else {
					return false;
				}
      }else {
        return false;
      }
    }else {
      return false;
    }
  }else {
    return false;
  }
}
 ?>
