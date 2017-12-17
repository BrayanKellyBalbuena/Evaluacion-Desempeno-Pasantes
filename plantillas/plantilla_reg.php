<?php
$objPlantilla = new plantilla(); 
class plantilla {
	function __construct() {
?>
<!Doctype html>

<html>
	<head>
		<meta charset = "utf8">
		<link rel = "stylesheet" href = "css/stilo.css"  type = "text/css" media = "all"/>
	</head>
	
	<body>
		<div  id = "divPagina">
			<div id = "divEncabezado">
				<a href = "./">
					<img id = "logo" src = "img/logo.png"> 
				</a>
			</div>
			<div id = "divMenu">
				<nav id = "navLink">
					<ul>
						<li><a href = "./">Inicio</a></li>
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
	</body>
</html>	
<?php	
		}
	}
