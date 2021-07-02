<!DOCTYPE html>
<?php
require('../controlSesion.php');
 ?>

<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ejer26BDAbm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<script src="jquery-3.6.0.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="estilo.css">
  </head>
  <body>
    <div class="fondo">
      <div class="encabezado">
        <h1>Ejercicio 26 BDAbm</h1>
        Orden:
        <input type="text" id="inputOrden" disabled="disabled" name="" value="">
        <div id="botones">
          <input type="button" id="cargar" value="Cargar">
          <input type="button" id="limpiar" value="Limpiar">
          <input type="button" id="verAlta" value="Dar de Alta">
          <input type="button" id="cerrarSesion" value="Cerrar Sesion">
        </div>
      </div>
      <div class="caja">
        <table>
          <thead>
            <tr>
              <th onclick="setearOrden('nombre', 'Nombre')">Nombre</th>
              <th onclick="setearOrden('apellido', 'Apellido')">Apellido</th>
              <th onclick="setearOrden('Fecha', 'Fecha')">Fecha</th>
              <th onclick="setearOrden('inscripto', 'Inscripto')">Inscripto</th>
              <th onclick="setearOrden('legajo', 'Legajo')">Legajo</th>
              <th onclick="setearOrden('Promedio', 'Promedio')">Promedio</th>
              <th onclick="setearOrden('id', 'ID')">ID</th>
              <th onclick="setearOrden('estado', 'Estado')">Estado</th>
              <th onclick="setearOrden('foto', 'Foto carnet')">Foto carnet</th>
              <th>Modis</th>
              <th>Bajas</th>
            </tr>
            <tr>
              <th><input type="text" id="filtradonombre" name="" value=""></th>
              <th><input type="text" id="filtradoapellido" name="" value=""></th>
              <th><input type="text" id="filtradofecha" name="" value=""></th>
              <th><input type="text" id="filtradoinscripto" name="" value=""></th>
              <th><input type="text" id="filtradolegajo" name="" value=""></th>
              <th><input type="text" id="filtradopromedio" name="" value=""></th>
              <th><input type="text" id="filtradoid" name="" value=""></th>
              <th><input type="text" id="filtradoestado" name="" value=""></th>
              <th><input type="text" id="filtradofoto" name="" value=""></th>
            </tr>
          </thead>
          <tbody id="campos"></tbody>
        </table>
        <div id="modal">
  			<div class="modalCabecera">
  				<h3>Dar de alta</h3>
  				<button id="cerrarAlta">Cerrar</button>
  			</div>
  			<form id="formulario">
  				<ul>
  					<li><label>Nombre:<br/>
  						<input type="text" id="altaNombre" name="nombre" placeholder="Ingrese el Nombre..." autofocus="autofocus" required="required" />
  					</label></li>
  					<li><label>Apellido:<br/>
  						<input type="text" id="altaApellido" name="apellido" placeholder="Ingrese el Apellido..." required="required" />
  					</label></li>
  					<li><label>Inscripto (0 o 1):<br/>
  						<input type="text" id="altaInscripto" name="inscripto" placeholder="Ingrese Estado de Inscripcion..." required="required" />
  					</label></li>
  					<li><label>Legajo:<br/>
  						<input id="altaLegajo" name="legajo" placeholder="Ingrese el Legajo..." required="required" />
  					</label></li>
  					<li><label>Fecha:
  					<input type="date" id="altaFecha" name="fecha" required="required" />
          </label></li>
          <li><label>Promedio:<br/>
            <input id="altaPromedio" name="promedio" placeholder="Ingrese el Promedio..." required="required" />
          </label></li>
          <li><label>Foto Carnet (Usted debe cargar SIEMPRE una foto):<br/>
            <input type="file" id="altaFoto" name="foto" placeholder="Ingrese una Foto..." required="required" />
          </label></li>
          <li><label>Estado:<br/>
            <select type="text" id="selectestado" name="estado" required="required">
            </select>
          </label></li>
  					<li><label id="mostrarResultado">
  					</label></li>
  					</ul>
  					<div id="form-btn">
  						<input class="cursor-pointer-input" type="button" onclick="actualizarAltas()" value="Enviar" />
  						<input class="cursor-pointer-input" type="reset" value="Reset" />
  					</div>
  				</form>
  			</div>
        <div id="modalPDF">
  			<div class="modalCabecera">
  				<h3>Foto Carnet</h3>
  				<button id="cerrarPDF">Cerrar</button>
  			</div>
        <h1>Hola mundo</h1>
        <div id="imageContainer">
        </div>
  			</div>
      </div>
      <div id="backdrop"></div>
      Total de registros: <span id="totales"></span>
      <div class="anterior">
        <a href="../index.html">Volver a la pagina anterior.</a>
        </div>
    </div>
    <script>
    $('#cargar').click(() => {
      setearOrden("nombre", "Nombre");
    });

    var setearOrden = (ordenAsignado, tituloOrden) => {
      solicitarCargarAjax(ordenAsignado);
      $("#inputOrden").val(tituloOrden);
    }

    var solicitarCargarAjax = (ordenAsignado) => {
      var campos = document.getElementById("campos");
      $('#campos').empty();
      $('#totales').html("0");
      $('#campos').html("<tr><td colspan = '9'>Cargando informacion</td></tr>");

      $.ajax({
        type: "post",
        url: "./PHPData.php",
        data: {
          orden: ordenAsignado,
          nombre: $("#filtradonombre").val(),
          apellido: $("#filtradoapellido").val(),
          fecha: $("#filtradofecha").val(),
          inscripto: $("#filtradoinscripto").val(),
          legajo: $("#filtradolegajo").val(),
          promedio: $("#filtradoapellido").val(),
          foto: $("#filtradofoto").val(),
          id: $("#filtradoid").val(),
          estado: $("#filtradoestado").val()
        },
        success: (respuesta) => {
          console.log(respuesta);
          $('#campos').empty();
          var json = JSON.parse(respuesta);
          $("#totales").html(json.cuenta);
          json.usuario.forEach((item) => {
            var tere = document.createElement("tr");
            for(var key in item){
                var tede;
                var newBTN;
                tede = document.createElement("td");
                tede.innerHTML = item[key];
                tere.appendChild(tede);
            }

            var tede;
            var newBTN;

            tede = document.createElement("td");
            newBTN = document.createElement("button");
            newBTN.className = "";
            newBTN.innerHTML = "Foto";
            newBTN.setAttribute("onclick", "solicitarCargarFoto('" + item['codlegajo'] + "')");
            tede.appendChild(newBTN);
            tere.appendChild(tede);

            tede = document.createElement("td");
            newBTN = document.createElement("button");
            newBTN.className = "";
            newBTN.innerHTML = "Modificar";
            newBTN.setAttribute("onclick", "cambiarInformacion('" + item['codlegajo'] + "')");
            tede.appendChild(newBTN);
            tere.appendChild(tede);

            tede = document.createElement("td");
            newBTN = document.createElement("button");
            newBTN.className = "";
            newBTN.innerHTML = "Baja";
            newBTN.setAttribute("onclick", "borrarInformacion('" + item['codlegajo'] + "')");
            tede.appendChild(newBTN);
            tere.appendChild(tede);

            campos.appendChild(tere);
          });
        }
      });
    }

    var solicitarCargarFoto = (legajo) =>{

      $.ajax({
        type: "post",
        url: "./fotoSQL.php",
        data: {codigo: legajo},
        success: (respuesta) => {

          var objJSON = JSON.parse(respuesta);

          $("#modalPDF").addClass("activo");
          $("#backdrop").addClass("activo");
          $("main").addClass("inactivo");
          $("#imageContainer").empty();
          $("#imageContainer").html("<iframe width='100%' height='600px' src='data:image/jpeg;base64,"+objJSON+"'></iframe>");
        }
      });
    }

    var cambiarInformacion = (legajo) => {
      actualizarAltas = () => cambiandoInformacion(legajo);

      $("#modal").addClass("activo");
      $("#backdrop").addClass("activo");
      $("main").addClass("inactivo");
      completarComboBox();

      $.ajax({
        type: "post",
        url: "./actualizarSQL.php",
        data: {codigo: legajo},
        success: (respuesta) => {
          console.log(respuesta);
          var objJSON = JSON.parse(respuesta);
          $("#altaNombre").val(objJSON.codnombre);
          $("#altaApellido").val(objJSON.codapellido);
          $("#altaInscripto").val(objJSON.codinscripto);
          $("#altaLegajo").val(objJSON.codlegajo);
          $("#altaFecha").val(objJSON.codfecha);
          $("#altaPromedio").val(objJSON.codpromedio);
          $("#altaFoto").val(objJSON.codfoto);
          $("#selectestado").val(objJSON.codestado);
        }
      });
    }

    var cambiandoInformacion = (legajo) => {
      event.preventDefault();

      var formElement = document.getElementById("formulario");
      var formData = new FormData(formElement);

      $.ajax({
        type:"post",
        method:"post",
        enctype:"multipart/form-data",
        url:"./modificarSQL.php",
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success: (respuesta) =>{
          var objJSON = JSON.parse(respuesta);

          console.log(respuesta);

          $("modalPDF").addClass("activo");
          $("#backdrop").addClass("activo");
          $("#main").addClass("inactivo");
          newP = document.createElement("p");
          if (objJSON.stringDeError) {
            newP.innerHTML = `Error:<br/><br/>${objJSON.stringDeError}`;
          } else {
            newP.innerHTML = `Fila Modificada:<br/><br/>Nombre: ${objJSON.nombre}<br>Apellido: ${objJSON.apellido}<br>Fecha: ${objJSON.fecha}<br>Inscripto: ${objJSON.inscripto}<br>Legajo: ${objJSON.legajo}<br>Promedio: ${objJSON.promedio}<br>Imagen: ${objJSON.imagen}<br>ID: ${objJSON.id}<br>Estado: ${objJSON.estado}`;
          }
          $("#imageContainer").empty();
          $("#imageContainer").append(newP);
        }
      });
    }

    var borrarInformacion = (legajo) =>{
      $('#selectestado').empty();
      $('#campos').html("<p>Solicitando datos....</p>");

      $.ajax({
        type: "post",
        url: "./borrarSQL.php",
        data: {
          codigo: legajo
        },
        success: (respuesta) => {
          console.log(respuesta);
        }
      });
    }

    var completarComboBox = () => {
      select = document.getElementById('selectestado');
      $('#selectestado').empty();
      $('#campos').html("<p>Cargando datos...</p>");

      $.ajax({
        type: "post",
        url: "./getComboBox.php",
        data: {},
        success: (respuesta) => {
          $('#selectestado').empty();

          var objJSON = JSON.parse(respuesta);

          objJSON.forEach((item) => {
            var nuevaOpcion = document.createElement("option");
            nuevaOpcion.value = item;
            nuevaOpcion.innerHTML = item;
            select.appendChild(nuevaOpcion);
          });

        }
      })
    }

    var actualizarAltas = () => solicitarAltaAjax();

    $("#verAlta").click(() => {
      actualizarAltas = () => solicitarAltaAjax();
      $("#modal").addClass("activo");
      $("#backdrop").addClass("activo");
      $("main").addClass("inactivo");
      completarComboBox();
    });

    var solicitarAltaAjax = () => {
      event.preventDefault();

      var formElement = document.getElementById("formulario");
      var formData = new FormData(formElement);

      $.ajax({
        type: "post",
        method: "post",
        enctype: "multipart/form-data",
        url: "./insertarSQL.php", //cambiar por insert
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success: (respuesta) => {
          console.log(respuesta);
        }
      });
    };

    $('#cerrarSesion').click(() => {
      location.href = "../cierreSesion.php";
    });


    $("#limpiar").click(()=>{
      $("#campos").empty();
      $("#totales").html("0");
      $("#inputOrden").val("");
    });


    $("#cerrarAlta").click(() => {
      $("#modal").removeClass("activo");
      $("#backdrop").removeClass("activo");
      $("main").removeClass("inactivo");
    });

    $("#verPDF").click(() => {
      $("#modalPDF").addClass("activo");
      $("#backdrop").addClass("activo");
      $("main").addClass("inactivo");
    });

    $("#cerrarPDF").click(() => {
      $("#modalPDF").removeClass("activo");
      $("#backdrop").removeClass("activo");
      $("main").removeClass("inactivo");
    });
    </script>
  </body>
</html>
