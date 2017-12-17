<?php 
	require('libs/Administrador.php');
	verificarUsuario();
	include('plantillas/plantilla_usuario.php');
?>

<center>
<br></br>
<h3>Usuario Index</h3>
	<a href = "formulario.php" style = "float:left; ">
	<img  style = "margin-left:120px; "src= "img/encuesta.jpeg" height = "160px" width="300px"/>
	</br><h5>Llenar encuesta</h5>
	</a>
	<a href = "encuestas_realizadas.php" style = "float:left; ">
	<img  style = "margin-left:120px; "src= "img/encuestas.gif" height = "160px" width="300px"/>
	</br><h5>Encuestas realizadas</h5>
	</a>
</center>