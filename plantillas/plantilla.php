<?php
$objPlantilla = new plantilla(); 
class plantilla {
	function __construct() {
?>
<!Doctype html>

<html lang="es">
	<head
		<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel = "stylesheet" href = "css/stilo.css"  type = "text/css"/>
		<link rel = "stylesheet" href = "fundation/css/foundation.css"  type = "text/css"/>
		
		<script src="fundation/js/vendor/modernizr.js"></script>
	</head>
	
	<body>
		<div  id = "divPagina">
			<div  id = "divEncabezado">
				<nav class="top-bar" data-topbar id = "navLink">
					<ul class = "title-area">
						<li class="name"><a class="button radius" href ="login.php">Inicio</a></li>
						<li class="active"><a class="button radius"href ="usuario_registro.php">Registrarte</a></li>
						<?php
						  if (isset($_SESSION['usrAdmin'])){
							echo"<li class='button raduis'><a href = \"logout.php\">Salir</a></li>";
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
		<footer><div id = "divPie">
				<em><p style = "min-height: 20px;">Dererchos Reservados KB</p></em>
			</div></footer>
			
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
