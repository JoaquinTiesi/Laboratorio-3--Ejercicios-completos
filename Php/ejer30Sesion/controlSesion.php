<?php
session_start();
if (!isset($_SESSION['idSesion'])) {
  header("Location: ../inicio.html");
  exit();
}
 ?>
