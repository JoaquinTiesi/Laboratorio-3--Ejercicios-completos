<?php
echo "Clave=".$_GET['cadena'];
echo "<br>";
$str = .$_GET['cadena'];
echo "Clave encriptada en MD5:";
echo "<br>";
echo md5($str);
echo "<br>";
echo "Clave encriptada en SHA1:";
echo "<br>";
echo sha1($str);
 ?>
