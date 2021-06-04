<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ejer03Require</title>
    <style media="screen">
    html,body{
      width:100%;
      height:100%;
      margin:0%;
      overflow: hidden;
    }
    div.fondo{
      width: 100%;
      height: 100%;
      background-color: lightgray;
      align-items: center;
      text-align: center;
      overflow: auto;
    }
    div.encabezado{
      width: 100%;
      height: 5%;
      background-color: lightgray;
      align-items: center;
      text-align: center;
    }
    div.caja{
      width: 100%;
      height: 80%;
      align-items: left;
      text-align: left;
      background-color: white;
      overflow: auto;
    }
    div.anterior{
      background-color:lightblue;
      margin:auto;
      box-sizing:border-box;
      float:right;
      border: solid;
      border-color: red;
      font-size: 2vw;
    }
    img{
      max-width:100%;
      max-height:100%;
      width:80%;
      height: 80%;
      opacity: 0.5;
      display: block;
      margin-left: auto;
      margin-right: auto;
    }
    h1{
      color: black;
      font-size: 2vw;

    }
    p{
      font-size: 2vw;
      color: black;
      float: left;
      margin-left: 15%;
    }
    table{
      border-collapse: collapse;
    }
    td{
      border-width: 1px;
      border: solid;
      background-color: lightblue;
    }
    input{
      width: 30%;
      height: 10%;
      text-align: left;
      font-size: 2vw;
      margin-right: 20%;
      margin-left: 5%;
    }
    select{
      width: 30%;
      height: 10%;
      text-align: left;
      font-size: 2vw;
      margin-left: 5%;
    }
    </style>
  </head>
  <body>
    <div class="fondo">
      <div class="encabezado">
        <h1>Ejercicio03 Require</h1>
      </div>
      <div class="caja">
        <h1>En este archivo se utiliza el require(), por lo que se bloquea la ejecucion en el primer error</h1>
        <br>
        <h2>Las variables son:</h2>
        <br>
        <b>Warning</b>: Use of undefined constant includeInexistente - assumed 'includeInexistente' (this will throw an Error in a future version of PHP) in C:\xampp\htdocs\joa\Php\ejer02Include\index.php on line 101 <br><br>
        <b>Warning</b>: Use of undefined constant inc - assumed 'inc' (this will throw an Error in a future version of PHP) in C:\xampp\htdocs\joa\Php\ejer02Include\index.php on line 101 <br><br>
        <b>Warning</b>: require(includeInexistenteinc): failed to open stream: No such file or directory in C:\xampp\htdocs\joa\Php\ejer02Include\index.php on line 101 <br><br>
        <b>Warning</b>: require(includeInexistenteinc): failed to open stream: No such file or directory in C:\xampp\htdocs\joa\Php\ejer02Include\index.php on line 101 <br><br>
        <b>Fatal error</b>:  require(): Failed opening required 'includeInexistenteinc' (include_path='.:/usr/share/pear:/usr/share/php') in C:\xampp\htdocs\joa\Php\ejer02Include\index.php on line 101 <br><br>
      </div>
      <div class="anterior">
        <a href="../index.html">Volver a la pagina anterior.</a>
        </div>
    </div>
  </body>
</html>
