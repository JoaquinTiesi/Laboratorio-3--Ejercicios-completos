<!DOCTYPE html>
<?php
require('../controlSesion.php'); //Verifica que la sesion este iniciada
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
  				<h3>Carga de datos:</h3>
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
          <li><label>Identificacion (ID):<br/>
            <input id="altaid" name="id" readonly/>
          </label></li>
          <li><label>Estado:<br/>
            <select type="text" id="selectestado" name="estado" required="required">
            </select>
          </label></li>
  					<li><label id="mostrarResultado">
              <input type="text" id="mostrando" placeholder="Esperando..." disabled="disabled" />
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
    $('#cargar').click(() => { //Primera carga de las tablas con la informacio
      setearOrden("nombre", "Nombre"); //Llama a setearOrden, para armar la tabla en base al orden elegido
    });

    $("#limpiar").click(()=>{ //Limpia la tabla
      $("#campos").empty();
      $("#totales").html("0");
      $("#inputOrden").val("");
    });

    $("#cerrarAlta").click(() => { //Cierra el formulario de altas y lo limpia
      $("#altaNombre").val("");
      $("#altaApellido").val("");
      $("#altaInscripto").val("");
      $("#altaLegajo").val("");
      $("#altaFecha").val("");
      $("#altaPromedio").val("");
      $("#altaFoto").val("");
      $("#selectestado").val("");
      $("#altaid").val("");
      setearOrden("nombre", "Nombre"); //Vuelve a cargarla tabla actualizada
      $("#modal").removeClass("activo");
      $("#backdrop").removeClass("activo");
      $("main").removeClass("inactivo");
    });

    $("#verPDF").click(() => { //Muestra el div contenedor de las imagenes
      $("#modalPDF").addClass("activo");
      $("#backdrop").addClass("activo");
      $("main").addClass("inactivo");
    });

    $("#cerrarPDF").click(() => { //Cierra el div contenedor de las imagenes
      $("#modalPDF").removeClass("activo");
      $("#backdrop").removeClass("activo");
      $("main").removeClass("inactivo");
    });

    var actualizarAltas = () => solicitarAltaAjax();

    $("#verAlta").click(() => { //Muestra el formulario de Altas
      actualizarAltas = () => solicitarAltaAjax(); //Conecta con la solicitud de alta
      $("#modal").addClass("activo");
      $("#backdrop").addClass("activo");
      $("main").addClass("inactivo");
      completarComboBox();
    });

    var solicitarAltaAjax = () => { //Carga nueva informacion en la Base de Datos
      event.preventDefault();

      var formElement = document.getElementById("formulario");
      var formData = new FormData(formElement);

      $.ajax({
        type: "post",
        method: "post",
        enctype: "multipart/form-data",
        url: "./insertarSQL.php", //cambiar por insert...
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success: (respuesta) => {
          $("#mostrando").val("Cargado con exito"); //Si funciona la carga, lo reporta
          console.log(respuesta);
        }
      });
    };

    var setearOrden = (ordenAsignado, tituloOrden) => { //Va a cargar la tabla en base a los parametros de orden traidos
      solicitarCargarAjax(ordenAsignado); //Carga la tabla
      $("#inputOrden").val(tituloOrden); //Muestra el orden establecido
    }

    var solicitarCargarAjax = (ordenAsignado) => { //Carga las tablas con el orden dado
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
        success: (respuesta) => { //Al exito de ordenar la informacion, crea la tabla ordenada
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
            newBTN.setAttribute("onclick", "solicitarCargarFoto('" + item['codid'] + "')"); //Boton para mostrar la foto
            tede.appendChild(newBTN);
            tere.appendChild(tede);

            tede = document.createElement("td");
            newBTN = document.createElement("button");
            newBTN.className = "";
            newBTN.innerHTML = "Modificar";
            newBTN.setAttribute("onclick", "cambiarInformacion('" + item['codid'] + "')"); //Boton para cambiar la informacion
            tede.appendChild(newBTN);
            tere.appendChild(tede);

            tede = document.createElement("td");
            newBTN = document.createElement("button");
            newBTN.className = "";
            newBTN.innerHTML = "Baja";
            newBTN.setAttribute("onclick", "borrarInformacion('" + item['codid'] + "')"); //Boton para dar de baja al usuario
            tede.appendChild(newBTN);
            tere.appendChild(tede);

            campos.appendChild(tere);
          });
        }
      });
    }

    var solicitarCargarFoto = (id) =>{  //Muestra la foto en base al ID correspondiente

      $.ajax({
        type: "post",
        url: "./fotoSQL.php",
        data: {codigo: id},
        success: (respuesta) => {

          var objJSON = JSON.parse(respuesta);

          $("#modalPDF").addClass("activo");
          $("#backdrop").addClass("activo");
          $("main").addClass("inactivo");
          $("#imageContainer").empty();
          $("#imageContainer").html("<iframe width='100%' height='420px' src='data:image/jpeg;base64,"+objJSON+"'></iframe>"); //Muestra la imagen pedida a la base de datos
        }
      });
    }

    var cambiarInformacion = (id) => { //Actualizamos la informacion de una tabla en particular
      actualizarAltas = () => cambiandoInformacion(id); //Toma el control del formulario de altas para actualizar

      $("#modal").addClass("activo");
      $("#backdrop").addClass("activo");
      $("main").addClass("inactivo");
      completarComboBox(); //Rellena el comboBox con las opciones posibles

      $.ajax({
        type: "post",
        url: "./actualizarSQL.php",
        data: {codigo: id},
        success: (respuesta) => { //Rellena las opciones con los valores actuales de la tabla en el formulario
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
          $("#altaid").val(objJSON.codid);
        }
      });
    }

    var cambiandoInformacion = (id) => { //Cambia la informacion de la tabla por la nueva dada
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
          $("#mostrando").val("Cargado con exito"); //Se informa si la informacion fue actualizada
          console.log(respuesta);

        }
      });
    }

    var completarComboBox = () => { //Completa el comboBox con las opciones posibles
      select = document.getElementById('selectestado');
      $('#selectestado').empty();
      //$('#campos').html("<p>Cargando datos...</p>");

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

    var borrarInformacion = (id) =>{ //Borramos una tabla en particular en base al ID
      $('#selectestado').empty();

      $.ajax({
        type: "post",
        url: "./borrarSQL.php",
        data: {
          codigo: id},
        success: (respuesta) => {
          setearOrden("nombre", "Nombre"); //Vuelve a cargarla tabla actualizada
          console.log(respuesta);
        }
      });
    }

    $('#cerrarSesion').click(() => { //Cierra sesion y devuelve al LOGIN
      location.href = "../cierreSesion.php";
    });

    </script>
  </body>
</html>
