<?php
$objPlantilla = new plantilla1(); 
class plantilla1 {
	function __construct() {
?>
<!Doctype html>

<html lang="es">
	<head>
		<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel = "stylesheet" href = "css/stilo.css"  type = "text/css"/>
		<link rel = "stylesheet" href = "fundation/css/foundation.css"  type = "text/css"/>
		<script src="fundation/js/vendor/modernizr.js"></script>
		
	</head>
	
	<body>
		<div  id = "divPagina">
			<div id = "divEncabezado">
				<nav class = "top-bar" data-topbar id = "navLink">
					<ul class = "title-area">
						<li class = "name"><a class = "button raduis" href = "plantilla_usuario.php">Inicio</a></li>
						<li class = "name"><a class = "button raduis" href = "formulario.php">Llenar encuesta</a></li>
						<li class = "name"><a class = "button raduis" href = "encuestas_realizadas.php">Encuestas Realizada</a></li>
						<?php
						  if (isset($_SESSION['Usuario'])){
							echo"<li class='name'><a class ='button raduis' href = \"logout.php\">Salir</a></li>";
						  }
						?>
					</ul>
				
				</nav>
			</div>
			<div id = "divContenido">

<?php 
	}
	
	function __destruct() {
?>
	</div>
			<div id = "divPie">
				<em><p>Dererchos Reservados KB</p></em>
			</div>
		</div>
		<script src = "fundation/js/vendor/jquery.js" ></script>
		<script src ="fundation/js/foundation.min.js"></script>
		<script>
	</body>
</html>	
<?php	
		}
	}
