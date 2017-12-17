<?php 
require_once('libs/Administrador.php');
require_once('Exportador.php');
verificarUsuario();

$admin = new Administrador();
$exportador = new Exportador();

if (isset($_SESSION['usrAdmin'])) {
		include ("plantillas/plantilla_admin.php");
}elseif(isset($_SESSION['Usuario'])){
		include("plantillas/plantilla_usuario.php");
}
if(isset ($_POST)) {
	if(!empty($_POST['txtEvaluacion']) && is_array($_POST['txtEvaluacion'])) {
		foreach ($_POST['txtEvaluacion'] as $indice) {
			$evaluacion = $admin->editarEvaluacion( $indice );
			$exportador->exportar($evaluacion);
		}
	}
}if(isset($_GET['ind']) ) { 
	$evaluacion = $admin->editarEvaluacion( $_GET['ind'] );
	$exportador->exportar($evaluacion);
}
if(isset($_GET['elim'])) {
	$admin = new Administrador();
	$admin->eliminarEvaluacion($_GET['elim']);
}

$admin = new Administrador();
$evaluaciones = $admin->database->cargarEvaluaciones();
	
?>

<style type="text/css">
	table{
		width: 70%;
	}
</style>
<br>
<div class='container'>
	<center>
		<h3>Todos las encuestas realizadas</h3>
		<br/>
		<form action = "" method ="POST" >
			<input class = "button raduis" type = "submit" value = "Exportar Selecciondados">
		<table>
			<thead>
				<td></td>
				<th >Nombre</th>
				<th >Empresa</th>
				<th ></th>
			<tbody>
				<?php 
					foreach ($evaluaciones as $ind => $evaluacion) {
						echo "<tr><td><input type='checkbox' name = 'txtEvaluacion[]' value='{$evaluacion->nombreEgresado}'/></td>
						<td><h4>{$evaluacion->nombreEgresado}</h4></td><td ><h4>{$evaluacion->nombreEmpresa}</h4></td>
						<td><a class='small button' href='encuestas_realizadas.php?ind=".$ind."'>Exportar</a>&nbsp;&nbsp;&nbsp;
						<a class='small button' onclick=\"return confirm('Esta seguro de eliminar')\" href='encuestas_realizadas.php?elim=".$ind."'>Eliminar</a></td></tr>";
					}
				?>
			</tbody>
		</table>
		</form>
	</center><a href=""></a>
</div>