<?php



/**
 * @author Brayan Kelly Balbuena
 * @version 1.0
 * @created 09-Jun-2015 7:36:31 PM
 */
class DataBase
{

	public $usuarios;
	public $evaluaciones;

	function __construct()
	{
		$this->usuarios = array();
		$this->evaluaciones = array();
	}

	//metodo que permite cargar los evaluaciones
	function cargarEvaluaciones() {
		return $this->evaluaciones;
	}
	
	//metodo que permite cargar los usuarios
	public function cargarUsuarios() {
		return $this->usuarios;
	}
	
	//metodo que serializa el la DataBase y la guarda
	public function guardarDatos( $datos ) {
		$datos = serialize ( $datos );       // serializa la base de datos que pasan como parametro
		if( !file_exists ( "data" ) ) {      //si no existe la carpeta data la crea
			mkdir( "data", 0777, true );
		}
		file_put_contents( "data/datos.dat", $datos );
	}
}
?>