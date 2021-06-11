<?php
$objProveedor = new stdClass;
$objProveedor->Usuario=$_POST['usuario'];
$objProveedor->Login=$_POST['login'];
$objProveedor->Apellido=$_POST['apellido'];
$objProveedor->Nombre=$_POST['nombre'];
$objProveedor->Fecha=$_POST['fecha'];
echo json_encode($objProveedor);
 ?>
