<?php
if (isset($_POST['submit'])) {
  echo "Clave=".$_POST['cadena']
  echo md5(.$_POST['cadena']);
} ?>
