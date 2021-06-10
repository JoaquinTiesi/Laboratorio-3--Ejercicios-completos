<?php
echo "Clave= ".$_GET['cadena'];
echo "<br>";
$CLAVE = $_GET['cadena'];
echo md5($CLAVE);
 ?>
