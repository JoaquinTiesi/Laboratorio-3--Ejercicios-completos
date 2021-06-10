<?php
echo "Clave = ".$_GET['cadena'];
echo "<br>";
echo "Clave encripta en md5(): ";
$CLAVE = $_GET['cadena'];
echo md5($CLAVE);
echo "<br>";
echo "Clave encriptada en sha1(): ";
echo sha1($CLAVE);
 ?>
