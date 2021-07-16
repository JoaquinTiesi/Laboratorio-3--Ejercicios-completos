<?php
session_start();
if (isset($_SESSION['idSesion'])) {
  header("Location: ./ejer26/index.php"); //Nos conecta con la pagina correcta si la sesion existe
}else {
  header("Location: ./inicio.html");
}
 ?>
