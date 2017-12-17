<?php
	include("plantillas/plantilla.php");
	include('libs/Administrador.php');

	$admin = new Administrador();
	$mensaje = "";
	
	if($_POST)
	{
		$nomUsuario = $_POST['txtNombre'];
		$contUsuario = $_POST['txtcontra'];
		if ($admin->login($nomUsuario,$contUsuario)) {
				header("location:admin_index.php");
		}else if (is_null($admin->login($nomUsuario,$contUsuario))) {
			header("location:usuario_index.php");
		}
		else {
			$mensaje = "<div data-alert class='alert-box warning round'>
			Usuario o contraseña incorrecta.<a href='#' class='close'>&times;</a></div>";
		}
	}
?>
	<div id="formlogin" align = "center">
		
		
		<form method = "post" action ="" id= "formD">
		<br/><br/><br/><br/>
		<?php echo $mensaje?>
			<fieldset>
				
				<legend><h2>Login</h2></legend>
					Usuario
					<input  type = "text" name = "txtNombre" required />
					Contraseña
					<input type = "password" name = "txtcontra" required />
					
			
			<button class="button radius" type = "submit">Accesar</button>
			<a  class="button radius" href="usuario_registro.php">Registrar</a>
			</fieldset>
				
		</form>
	</div>