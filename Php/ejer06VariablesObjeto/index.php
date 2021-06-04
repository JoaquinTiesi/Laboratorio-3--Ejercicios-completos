<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ejer06VariablesObjeto</title>
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
          <p>Código de artículo: cp001 <br>
            Descripción del artículo: Jaguel 800 gr <br>
            Precio unitario: 2000 <br>
            Cantidad: 2 <br></p>
         <h1>Tipo de $objRenglonPedido: object </h1>
         <h1>Definamos arreglo de pedidos:</h1>
         <h2><span style="color:blue">#$renglonesPedido</span> </h2>
         cp001  Jaguel  800 gr  2000  2<br>cp001  Jaguel  800 gr  2000  2<br>
         <br>
         <h2>Cantidad de renglones: 2</h2>
         <br>
         <h1>Producción de un objeto <span style="color:blue";>$objRenglonesPedido</span> con dos atributos array renglonesPedido y cantidadDeRenglones</h1>
         <p>Cantidad de renglones: 2</p>
         <br>
         <h1>Producción de un JSON jsonRenglones:</h1>
         <br>
         <p>{"renglonesPedido":[{"codArt":"cp001","descripcion":"Jaguel 800 gr","precioUnitario":2000,"cantidad":2},{"codArt":"cp001","descripcion":"Jaguel 800 gr","precioUnitario":2000,"cantidad":2}],"cantidadDeRenglones":2}</p>
      </div>
      <div class="anterior">
        <a href="../index.html">Volver a la pagina anterior.</a>
        </div>
    </div>
  </body>
</html>
