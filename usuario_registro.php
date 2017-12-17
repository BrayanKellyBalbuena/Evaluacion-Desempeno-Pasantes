<?php 
	include('plantillas/plantilla.php');
	include('libs/Usuario.php');
	
	$mensaje = "";
	$usuario = Usuario::cosntructorVacio();
	if($_POST) {
		$usuario = new Usuario ($_POST['txtEmail'], $_POST['txtClave'],
			$_POST['txtNombre'],$_POST['txtTelefono']);
		if($usuario->registrarUsuario($usuario)) {
			$mensaje = "<div data-alert class='alert-box success radius'>
			Gracias por registrase.<a href='#' class='close'>&times;</a></div>";
		}else{
			$mensaje = "<div data-alert class='alert-box warning round'>
			El usuario ya existe.<a href='#' class='close'>&times;</a></div>";;
		}
	}
?>
<br><br>
<div  id = "formularioReg" >
<?php echo $mensaje?>
<fieldset>
	<legend><h2>Formulario registro</h2></legend>
	<form method = "post" action = "" id = "formD" >
		<p>
			<label>Email:
				<input name = "txtEmail" type = "email" placeholder = "Email"
					maxlength = "30" required/>
			</label>
		</p>
		<p>
			<label>Clave:
				<input name = "txtClave"  type = "password" maxlength = "12" required/>
			</label>
		</p>
		<p>
			<label>Repetir contraseña:
				<input name = "txtClaveR"  type = "password" maxlength = "12" required/>
			</label>
		</p>
		<p>
			<label>Nombre:
				<input name = "txtNombre" type = "text" placeholder = "Nombre"
					maxlength = "20" required/>
			</label>
		</p>
		<p>
			<label>Telefono:
				<input name = "txtTelefono" type = "tel" placeholder = "###-###-#####" 
					pattern = "\d{3}\-\d{3}\-\d{4}" required/>
			</label>
		</p>
		<p align ="center" ><input class="button radius" type = "submit" value = "Enviar"/>
			<input class="button radius" type = "reset" value = "Limpiar"/>
		</p>
	</form>
</fieldset>
	
</div>
