<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ejer02Include</title>
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
        <h1>Ejercicio02 Include</h1>
      </div>
      <div class="caja">
        <h1>En este ejemplo se utiliza la funcion Include() que ubica codigo php definio en el archivo ejemplo2.inc</h1>
        <h1>Antes de insertar el Include las variables declaraas en el mismo no existen</h1>
        <br>
        <h1>Las variables son: </h1>
        <h1>La longitud de los arreglos es: 0</h1>
        <br>
        <h1>Aqui ya se ejecuto la funcion include(). Cuando se usa include ocurre que si el archivo "Inc" no existe, se visualiza un warning y el script sigue ejecutandose hasta el final.</h1>
        <br>
        <h1>Las dos variables tipo array asociativo en el inc son:</h1>
        <table>
          <tbody>
            <tr>
              <td>Carlos</td>
              <td>Manuel</td>
              <td>Rocio</td>
            </tr>
            <tr>
              <td>Rodrigo</td>
              <td>Carolina</td>
              <td>Ricardo</td>
            </tr>
          </tbody>
        </table>
        <br>
        <h1>La longitud de los arreglos es: 2</h1>
      </div>
      <div class="anterior">
        <a href="../index.html">Volver a la pagina anterior.</a>
        </div>
    </div>
  </body>
</html>
