<?php
$objPlantilla = new plantilla(); 
class plantilla {
	function __construct() {
?>
<!Doctype html>

<html >
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel = "stylesheet" href = "css/stilo.css"  type = "text/css"/>
		<link rel = "stylesheet" href = "fundation/css/foundation.css"  type = "text/css"/>
		
		<script src="fundation/js/vendor/modernizr.js"></script>
	</head>
	
	<body>
		<div   id = "divPagina">
			<div id = "divEncabezado">
				<nav class="top-bar" data-topbar id = "navLink">
					<<ul class = "title-area">
						<li class="name"><a class="button radius"href = "./">Inicio</a></li>
						<li class="name"><a class="button radius" href = "formulario.php">Llenar Encuesta</a><li>
						<li class="name"><a class="button radius" href = "admin_usuario.php">Usuarios</a><li>
						<li class="name"><a class="button radius" href = "encuestas_realizadas.php">Encuestas realizadas</a><li>
						<li class="name"><a class = "button"href = "admin_reset_DataBase.php" onclick = "return confirm('Esta seguro de proceder')">Reset DataBase</a><li>
						
						
						<?php
						  if (isset($_SESSION['usrAdmin'])){
							echo"<li class='name'><a class='button raduis' href = \"logout.php\">Salir</a></li>";
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
			$(document).foundation();
		</script>
	</body>
</html>	
<?php	
		}
	}
