<?php
session_start();
session_destroy();
header('Location: inicio.html'); //Destruye la sesion actual y nos devuelve al inicio
 ?>
