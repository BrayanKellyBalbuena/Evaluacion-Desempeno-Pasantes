<?php 
require('libs/Administrador.php');
verificarUsuario();
verificarAdmin();

include ("plantillas/plantilla_admin.php");


?>



</br>
	<h2 align = "center">Administrar</h2>
</br>
</br>
	<div id = "Administrar Usuarios" style = "float:left;">
		<a  href = "formulario.php">
			<img src= "img/encuesta.jpeg" height = "160px" width="300px"/>
			</br><h3> Llenar Encueta</h3>
		</a>
	</div>
	<div id = "encustas realizadas" style ="float:right">
		<a href = "encuestas_realizadas.php">
			<img src = "img/encuestas.gif" height = "160px" width = "300px"/>
		</br><h3>Encuestas Realizadas </h3>
	</a>
	</div>
	<div id="" align = "center" height = "160px" width="300px">
		<a href = "admin_usuario.php">
			<img src= "img/User.jpg" height = "160px" width="300px"/>
			<h3 align = "center">Usuarios</h3>
		</a>
	</div>
