<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ejer18FormToJSON</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<script src="jquery-3.6.0.min.js" type="text/javascript"></script>
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
    select{
      width: 30%;
      height: 10%;
      text-align: left;
      font-size: 2vw;
      margin-left: 5%;
    }
    * {
				margin: 0;
				padding: 0;
				font-size: 1em;
				box-sizing: border-box;
			}

			body {
				background-color: #FAF0E6;
				overflow: auto;
				position: relative;
			}

			h1, h2 {
				text-align: center;
			}

			h1 {
				font-size: 2.5em;
				color: #CD853F;
			}

			h2 {
				font-size: 2em;
				color: #D3D3D3;
				font-style: italic;
			}

			#container {
				width: 98vw;
				height: 100vh;
				margin: 0 auto;
				background-color: #FFFAF0;
				overflow: hidden;
			}

			main {
				height: 75vh;
				overflow: auto;
			}

			main.inactivo {
				pointer-events: none;
			}

			#modal {
				display: none;
				position: fixed;
				top: 25%;
				left: 25%;
				width: 50%;
				height: 50%;
				overflow: auto;
				z-index: 3;
				background-color: #cdcdcd;
				padding: 5px;
			}

			#modal.activo, #backdrop.activo {
				display: block !important;
			}

			#modal div.modalCabecera {
				display: flex;
				justify-content: space-between;
				align-items: center;
			}

			#modal div.modalCabecera button {
				padding: 5px;
				border: none;
			}

			#modal div.modalCabecera button:hover {
				background-color: red;
				cursor: pointer;
			}

			#backdrop {
				display: none;
				position: absolute;
				top: 0;
				left: 0;
				z-index: 2;
				width: 100vw;
				height: 100vh;
				background-color: #000000;
				opacity: 0.5;
			}

			#verModal {
				padding: 10px;
				margin: 25px;
			}

			form ul {
				list-style: none;
			}

			form ul li {
				float: left;
				width: 50%;
				min-width: 300px;
				min-height: 100px;
				background-color: #DCDCDC;
				border: 2px solid #A9A9A9;
				padding: 20px;
			}

			form ul li label {
				display: block;
			}

			form ul li label input, form ul li label select {
				width: 100%;
				margin-top: 5px;
			}

			#form-btn {
				clear: both;
				display: block;
				width: 100%;
				height: 100px;
				display: flex;
				justify-content: center;
				align-items: center;
				background-color: #A9A9A9;
			}

			.cursor-pointer-input {
				cursor: pointer;
				margin: 1%;
			}

			footer {
				padding: 10px 0;
			}

			footer p {
				text-align: center;
			}

			footer p a {
				text-decoration: none;
				color: inherit;
			}

			footer p a:hover {
				text-decoration: underline;
			}

			@media (max-width: 1220px) {
				form ul li {
					width: 100%;
				}

				#container {
				width: 95%;
				}
			}

			@media (max-width: 800px) {
				#modal {
					width: 100%;
					left: 0;
				}
			}

			@media (max-width: 360px) {
				#container {
					width: 360px;
					margin: 0;
				}

				body {
					min-width: 360px;
					overflow: auto;
				}
			}
    </style>
  </head>
  <body>
    <div class="fondo">
      <div class="encabezado">
        <h1>Ejercicio18 FormToJSON</h1>
      </div>
      <div class="caja">
        <button id="verModal">Abrir Formulario Modal</button>
      </div>
      <div id="modal">
			<div class="modalCabecera">
				<h3>Formulario Modal</h3>
				<button id="cerrarModal">Cerrar</button>
			</div>
			<form id="formulario">
				<ul>
					<li><label>ID Usuario:<br/>
						<input type="text" id="usuario" placeholder="Ingrese el usuario ID..." autofocus="autofocus" required="required" />
					</label></li>
					<li><label>Nombre de usuario:<br/>
						<input type="text" id="login" placeholder="Ingrese su nombre de usuario..." required="required" />
					</label></li>
					<li><label>Apellido:<br/>
						<input type="text" id="apellido" placeholder="Ingrese su apellido..." required="required" />
					</label></li>
					<li><label>Nombres:<br/>
						<input id="nombres" placeholder="Ingrese sus nombres..." required="required" />
					</label></li>
					<li><label>Fecha de Nacimieto:
					<input type="date" id="fechaNacimiento" required="required" />
					</label></li>
					<li><label id="mostrarResultado">
					</label></li>
					</ul>
					<div id="form-btn">
						<input class="cursor-pointer-input" type="submit" value="Enviar" />
						<input class="cursor-pointer-input" type="reset" value="Reset" />
					</div>
				</form>
			</div>
      <div class="anterior">
        <a href="../index.html">Volver a la pagina anterior.</a>
        </div>
    </div>
    <script>
			$('#formulario').submit(() => {

					$('#mostrarResultado').empty();
					$('#mostrarResultado').html("<p>Solicitando datos...</p>");

					$.ajax({
						type: "post",
						url: "./json.php",
						data: {
							usuario: $("#usuario").val(),
							login: $("#login").val(),
							apellido: $("#apellido").val(),
							nombres: $("#nombres").val(),
							fechaNacimiento: $("#fechaNacimiento").val()
						},
						success: (respuesta) => {
							$('#mostrarResultado').empty();
							$('#mostrarResultado').html(respuesta);
						}
					});

					event.preventDefault();
				});

			$("#verModal").click(() => {
				$("#modal").addClass("activo");
				$("#backdrop").addClass("activo");
				$("main").addClass("inactivo");
			});

			$("#cerrarModal").click(() => {
				$("#modal").removeClass("activo");
				$("#backdrop").removeClass("activo");
				$("main").removeClass("inactivo");
			});
		</script>
  </body>
</html>
