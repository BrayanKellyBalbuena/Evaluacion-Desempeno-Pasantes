<?php

/**
 * @author Baryan Kelly Balbuena
 * @version 1.0
 * @created 09-Jun-2015 7:38:21 PM
 */
 
require_once ('DataBase.php');
require_once ('Evaluacion.php');

class Usuario
{

	private $email = '';
	private $clave = '';
	private $nombre = '';
	private $telefono = '';
	private $database;
	private $tipo = "Usuario";
	
	//constructor
	function __construct( $email, $clave, $nombre, $telefono)
	{
		$this->email = $email;
		$this->clave = $clave;
		$this->nombre = $nombre;
		$this->telefono = $telefono;
		
		$archivo = "data/datos.dat";
		if( is_file($archivo) ) {
			$data = file_get_contents($archivo);
			$this->database = unserialize($data);
		}else {
			$this->database = new DataBase();
		}
	}
	
	public static function cosntructorVacio() {
		return new self('','','','');
	}
	
	function __set( $prop, $val) {
		if ( isset( $this->$prop ) ) {
			$this->$prop = $val;
		}
	}
	
	function __get( $prop) {
		if(isset ($this->$prop) ) {
			return $this->$prop;
		}
	}
	
	/**
	 *metodo que permite registrarse el usuario
	 *@ usuario
	 */
	public function registrarUsuario( Usuario $usuario) {
		if ( isset ($this->database->usuarios[$usuario->email])){
			return false;
		}else{
			$this->database->usuarios[$usuario->email] = $usuario;
			$this->database->guardarDatos($this->database);
			return true;
		}
	}
	
	/**
	 * metodo que permite agregar evaluacion
	 * @param evaluacion
	 */
	public function registrarEvaluacion(Evaluacion $evaluacion)
	{
		$this->database->evaluaciones[$evaluacion->nombreEgresado] = $evaluacion;
		$this->database->guardarDatos($this->database);
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
	 * metodo que permite eliminar Evaluacion
	 * @param indice
	 */
	public function eliminarEvaluacion($indice) {
		if ( isset( $this->database->evaluaciones[$indice] ) ) {
			unset( $this->database->evaluaciones[$indice] );
			$this->database->guardarDatos($this->database);
		}
	}

}
?>