<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ejer17Ajax</title>
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

			ul {
				list-style: none;
			}

			ul li {
				float: left;
				width: 25%;
				min-width: 300px;
				min-height: 300px;
				background-color: #DCDCDC;
				border: 2px solid #A9A9A9;
				padding: 20px;
			}

			ul li label {
				display: block;
			}

			h3 {
				margin-bottom: 20px;
			}

			.btn-image {
				margin: 0 auto;
				display: block;
				cursor: pointer;
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

			@media (max-width: 1600px) {
				ul li {
					width: 33.3%;
				}
			}

			@media (max-width: 1200px) {
				ul li {
					width: 50%;
				}
			}

			@media (max-width: 800px) {
				ul li {
					width: 100%;
				}

				#container {
				width: 95%;
				}
			}
    </style>
  </head>
  <body>
    <div class="fondo">
      <div class="encabezado">
        <h1>Ejercicio17 Ajax</h1>
      </div>
      <div class="caja">
        <ul>
					<li>
						<h3>Cadena a encriptar:</h3>
						<input style="width: 100%;" type="text" name="cadena" id="cadena" autofocus="autofocus" />
					</li>
					<li>
						<h3>Encriptar!</h3>
							<svg id="img-btn-encriptar" xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-arrow-right-square btn-image" viewBox="0 0 16 16">
							  <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm4.5 5.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
							</svg>
					</li>
					<li>
						<h3>Reulstado</h3>
						<div id="mostrarResultado"></div>
					</li>
					<li>
						<h3>Estado del requerimiento:</h3>
						<div id="mostrarEstado"></div>
					</li>
				</ul>
      </div>
      <div class="anterior">
        <a href="../index.html">Volver a la pagina anterior.</a>
        </div>
    </div>
  </body>
</html>
