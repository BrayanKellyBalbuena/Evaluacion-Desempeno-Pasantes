<?php
	include('libs/Administrador.php');
	 verificarUsuario();
	 verificarAdmin();
	include("plantillas/plantilla_admin.php");
	
	$admin = new Administrador();
	$usuario = Usuario::cosntructorVacio();
	$mensaje = '';
	if($_POST) {
		if ( isset ($_POST['txtTipo'] ) ){
			if ($_POST['txtTipo'] == "Usuario" ) {
				$usuario = new Usuario ($_POST['txtEmail'], $_POST['txtClave'],
					$_POST['txtNombre'],$_POST['txtTelefono']);
				$admin->agregarUsuario($usuario);
				$mensaje = <<<OET
				<div data-alert class="alert-box success raduis"> 
				Usuario agregado satisfactoriamente.<a href="#" class = "close">&times;</a></div>;
OET;
			}
			else if( $_POST['txtTipo'] == "Admin" ) {
				$usuario = new Usuario ($_POST['txtEmail'], $_POST['txtClave'],
					$_POST['txtNombre'],$_POST['txtTelefono']);
				$usuario->tipo = "Admin";
				$admin->agregarUsuario($usuario);
				$mensaje = "<div data-alert class='alert-box success round'>
			Administrador agregado satisfactoriamente.<a href='#' class='close'>&times;</a></div>";
			}
		}
	} else if( isset($_GET['editar']) ) {
		$usuario = $admin->editarUsuario($_GET['editar']);
		
	} else if( isset($_GET['eliminar']) ) {
		$admin->eliminarUsuario($_GET['eliminar']);
		
	}
?>
<br><br>
<center>
	<div  style = "width:50%">
	<?php  echo  $mensaje ?>
<fieldset>
	<legend> <h3>Formulario registra Usuario</h3> </legend>
	<form method = "post" action = "" id = "formD">
		<p>
			<label>Nombre:
				<input name = "txtNombre" value = "<?php echo $usuario->nombre; ?>" 
					type = "text" placeholder = "Nombre"maxlength = "30" required cheked/>
			</label>
		</p>
		<p>
			<label>Nombre Usuario:
				<input  name = "txtEmail" value = "<?php echo $usuario->email; ?>"
					type = "text" placeholder = "Nombre o Direccion de email" maxlength = "30"
					required/> 
			</label>
		</p>
		<p>
			<label>Password:
				<input name = "txtClave" value = "<?php echo $usuario->contrasena; ?>" 
					type = "password" required/>
			</label>
		</p>
		<p>
			<label>Tipo:
				<br>
				<input name = "txtTipo" type = "radio" value = "Admin" cheked/>Administrador
				<input name = "txtTipo" type = "radio" value = "Usuario" />Usuario
			</label>
		</p>
		<p>
			<label>Telefono:
				<input name = "txtTelefono" type = "tel" value = "<?php echo $usuario->telefono; ?>"
					placeholder = "###-###-#####" pattern = "\d{3}\-\d{3}\-\d{4}" required/>
			</label>
		</p>
		<p align = "center"><input class="button raduis" type = "submit" value = "Enviar"/>
			<input class ="button raduis" type = "reset" value = "Limpiar"/>
		</p>
	</form>
</fieldset>
	
</div>

<div>
	<table border="1">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Contrasena</th>
				<th>Nombre Usuario</th>
				<th>Tipo</th>
				<th>Telefono</th>
				<th colspan = "2">Opciones</th>
			</tr>
		</thead>
		<tbody>
			<?php
				if(empty( $usuarios = $admin->database->cargarUsuarios())){
				}else{
					$usuarios = $admin->database->cargarUsuarios();
					foreach($usuarios as $indice => $usr ) {
						echo "<tr>
						<td>{$usr->nombre}</td>
						<td>{$usr->clave}</td>
						<td>{$usr->email}</td>
						<td>{$usr->tipo }</td>
						<td>{$usr->telefono}</td>
						<td><a class='button raduis' href = \"admin_usuario.php?editar={$indice}\">Editar</a></td>
						<td><a class='button raduis' href = \"admin_usuario.php?eliminar={$indice} \" onclick=\"return confirm('Desea eliminar')\">Eliminar</a></td>	
					  </tr>";
				   }
				}
			?>
		</tbody>
	</table>
	</div>
</center>


