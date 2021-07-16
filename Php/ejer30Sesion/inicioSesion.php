<?php
if (!autenticar($_POST['usuario'], $_POST['contrasenia'])) { //Si no se autentica el inicio, devuelve a la pantalla de inicio
  header("Location: ./inicio.html");
}else {
  session_start(); //Inicia la sesion y asigna todos los valores para entrar

  $_SESSION['idSesion'] = session_id();

  $_SESSION['sessionLogin'] = $_POST['usuario'];

  header("Location: ./ejer26/index.php"); //Nos conecta con el .php que nos llevara a la pagina correcta
}

function autenticar($usuario, $contrasenia){ //Funcion de autenticacion en base al usuario y contrasenia ingresado

  define("SERVER","b9ovwmwcthrjvqamalfl-mysql.services.clever-cloud.com");
  define("USUARIO","ujvmkkxz9vqhyrky");
  define("PASS","DnGSpIXkhjULk2U1YUz8");
  define("BASE","b9ovwmwcthrjvqamalfl");

  $mysqli = new mysqli(SERVER,USUARIO,PASS,BASE);

  $mysqliQuery = "select * from listainicio where usuario = ? and contrasenia = ?"; //Busca igualdades en la lista de inicio

  if ($sentencia = $mysqli->prepare($mysqliQuery)) {
    if ($sentencia->bind_param("si", $usuario, $contrasenia)) {
      if ($sentencia->execute()) {
        $respuesta = $sentencia->get_result();

        $totalFilas = $respuesta->num_rows;

        if ($totalFilas == 1) { //Si encuentra una igualdad, da el OK
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
