<?php
echo "Clave = ".$_POST['encriptar'];
echo "<br>";
echo "Clave encripta en md5(): ";
$CLAVE = $_POST['encriptar'];
echo md5($CLAVE);
echo "<br>";
echo "Clave encriptada en sha1(): ";
echo sha1($CLAVE);
 ?>
