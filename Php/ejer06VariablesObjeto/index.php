<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
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
        <h1>Ejercicio06 VariablesObjeto</h1>
      </div>
      <div class="caja">
        <h1>Variables Tipo Objeto en PHP. Objeto Renglon de pedido</h1>
        <h1><span style="color:blue">$objRenglonPedido</h1>
        <?php
        $objRenglonPedido = new stdClass;
        $objRenglonPedido -> codArt = "cp001";
        $objRenglonPedido -> desc = "Jaguel 800 gr"
        $objRenglonPedido -> precioUnitario = 2000;
        $objRenglonPedido -> cant = 2;
        $renglonesPedido = [];
        array_push($renglonesPedido, $objRenglonPedido);
        $objRenglonPedido -> codArt = "cp002";
        $objRenglonPedido -> desc = "Jaguel 400 gr"
        $objRenglonPedido -> precioUnitario = 1400;
        $objRenglonPedido -> cant = 10;
        array_push($renglonesPedido, $objRenglonPedido);
        foreach ($renglonesPedido as $objRenglonPedido) {
          echo $objRenglonPedido -> codArt;
          echo $objRenglonPedido -> desc;
          echo $objRenglonPedido -> precioUnitario;
          echo $objRenglonPedido -> cant;
        }
         ?>
         <h1>Tipo de $objRenglonPedido: <?php echo gettype($objRenglonPedido) ?></h1>
         <h1>Definamos arreglo de pedidos:</h1>
         <h2><span style="color:blue">#$renglonesPedido</span> </h2>
         cp001  Jaguel  800 gr  2000  2
         cp002  Jaguel  400 gr  1400  10
         <br><br>
         <h2>Cantidad de renglones:</h2>
         <?php echo sizeof($renglonesPedido) ?>
         <br>
         <h1>Procuccion de un JSON jsnRenglones:</h1>
         <br>
         <?php $jsonRenglonesPedido = json_encode($renglonesPedido);
         echo $jsonRenglonesPedido ?>
      </div>
      <div class="anterior">
        <a href="../index.html">Volver a la pagina anterior.</a>
        </div>
    </div>
  </body>
</html>
