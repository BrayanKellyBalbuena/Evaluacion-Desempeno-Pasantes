<?php

/**
 * @author Brayan Kelly Balbuena
 * @version 1.0
 * @Programa: Exportador Evalacion de egresados ITLA pdf
 * @Class: Administrador
 * @Objectivo: clase que administra el sistema
 */
 
 session_start();
 require_once ('Usuario.php' );
 
class Administrador
{

	private $database;

	function __construct()
	{
		$archivo = "data/datos.dat";
		if( is_file($archivo) ) {
			$dato = file_get_contents( $archivo );
			$this->database = unserialize($dato);
		}else {
			$this->database = new Database();
		}
	}
	
	function __get ($prop) {
		if( isset( $this->$prop) ) {
			return $this->$prop;
		}
	}
	

	/**
	 * metodo que permite registrarEvaluacion
	 * @param evaluacion
	 */
	public function registrarEvaluacion(Evaluacion $evaluacion)
	{
		$this->database->evaluaciones[$evaluacion->nombreEgresado] = $evaluacion;
		$this->guardar();
	}
	
	/**
	 * metodo que permite editar Evaluacion
	 * @param indice
	 */
	public function editarEvaluacion($indice)
	{
		if ( isset( $this->database->evaluaciones[$indice] ) ) {
			return $this->database->evaluaciones[$indice];
		}else {
			return Evaluacion::constructorVacio();
		}
	}

	/**
	 * 
	 * @param evaluacion
	 */
	public function eliminarEvaluacion($indice) {
		if ( isset( $this->database->evaluaciones[$indice] ) ) {
			unset( $this->database->evaluaciones[$indice] );
			$this->guardar();
		}
	}

	/**
	 * 
	 * @param indice
	 */
	public function agregarUsuario(Usuario $usuario) {
		$this->database->usuarios[$usuario->email] = $usuario;
		$this->guardar();
	}

	/**
	 * 
	 * @param indice
	 */
	public function editarUsuario( $indice ) {
		 if( isset( $this->database->usuarios[$indice] ) ) {
			 return $this->database->usuarios[$indice];
		 }else {
			 return Usuario::constructorVacio();
		 }
	}

	/**
	 * 
	 * @param indice
	 */
	public function eliminarUsuario( $indice ) {
		if ( isset( $this->database->usuarios[$indice] ) ) {
			unset ( $this->database->usuarios[$indice] );
			$this->guardar();
		}
	}
	
	/**
	 * Metodo que permite guardar en la base de datos
	 */
	public function guardar() {
		$this->database->guardarDatos($this->database);
	}

	/**
	 * Metodo que permite iniciarSecion
	 */
	function login($nom, $cont) {
		$usuar;
		if (count($this->database->usuarios) == 0){
			if ($nom == 'admin' && $cont == '123') {
				$_SESSION['usrAdmin'] = $nom;
				return true;
			}	
		}else{
			if(isset ($this->database->usuarios[$nom]) ) {
				$usuar = $this->database->usuarios[$nom];
				if (($usuar->email == $nom && $usuar->clave == $cont) && $usuar->tipo == "Usuario") {
			        $_SESSION['Usuario'] = $nom;
					return null;
			    }else if (($usuar->email == $nom && $usuar->clave == $cont) && $usuar->tipo == "Admin") {
				    $_SESSION['usrAdmin'] = $nom;
				    return true;
		        }
			}
			 
	   }
	   return false;
	}

}
// metodo verifica acceso a las pagina
function verificarUsuario() {
	
		if (empty($_SESSION['usrAdmin']) && (empty(current($_SESSION)))) {
			header("Location:login.php");
		}
		
}

// Metodo para verificar Privilegios
function verificarAdmin() {
	$usrActual = key($_SESSION);
	if ($usrActual != "usrAdmin" ) {
		header("Location:logout.php");
	}
}
?>