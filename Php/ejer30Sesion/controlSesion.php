<?php
session_start();
if (!isset($_SESSION['idSesion'])) { //Verifica que esta la informacion de sesion cargada antes de entrar a cualquier pagina
  header("Location: ../inicio.html");
  exit();
}
 ?>
