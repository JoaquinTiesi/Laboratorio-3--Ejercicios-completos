<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ejer05MuestraVariableServidor</title>
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
        <h1>Ejercicio05 MuestraVariableServidor</h1>
      </div>
      <div class="caja">
        <h1>Variables del Servidor</h1>
        <h1><?php echo "This message is from server side." ?></h1>
        <table>
          <tbody>
            <tr>
              <td>SERVER_ADDR</td>
              <td><?php echo $_SERVER['SERVER_ADDR']; ?></td>
              </tr>
              <tr>
                <td>SERVER_PORT</td>
                <td><?php echo $_SERVER['SERVER_PORT']; ?></td>
              </tr>
              <tr>
                <td>SERVER_NAME</td>
                <td><?php echo $_SERVER['SERVER_NAME']; ?></td>
              </tr>
              <tr>
                <td>DOCUMENT_ROOT</td>
                <td><?php echo $_SERVER['DOCUMENT_ROOT']; ?></td>
              </tr>
          </tbody>
        </table>
        <br><br>
        <h1>Variables de Cliente</h1>
        <table>
          <tbody>
            <tr>
              <td>REMOTE_ADDR</td>
              <td><?php echo $_SERVER['REMOTE_ADDR']; ?></td>
            </tr>
            <tr>
              <td>REMOTE_PORT</td>
              <td><?php echo $_SERVER['REMOTE_PORT']; ?></td>
            </tr>
          </tbody>
        </table>
        <br><br>
        <h1>Variables de Requerimiento</h1>
        <table>
          <tbody>
            <tr>
              <td>SCRIPT_NAME</td>
              <td><?php echo $_SERVER['SCRIPT_NAME']; ?></td>
            </tr>
            <tr>
              <td>REQUEST_METHOD</td>
              <td><?php echo $_SERVER['REQUEST_METHOD']; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="anterior">
        <a href="../index.html">Volver a la pagina anterior.</a>
        </div>
    </div>
  </body>
</html>
