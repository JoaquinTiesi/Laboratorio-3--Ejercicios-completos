<?php
session_start();
if (isset($_SESSION['idSesion'])) {
  header("Location: ./ejer26/index.php");
}else {
  header("Location: ./inicio.html");
}
 ?>
