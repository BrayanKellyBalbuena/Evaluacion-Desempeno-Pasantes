<?php

/**
 * @author Brayan Kelly Balbuena
 * @version 1.0
 * @Clase : Evaluacion 
 * @clase que representa la evaluacion de los egresados
 * @created 09-Jun-2015 7:36:29 PM
 */
 
 require_once ('DataBase.php');
 
class Evaluacion {
	
	private $fechaReporte = '';
	private $sector = '';
	private $nombreEmpresa = '';
	private $egresados = '';
	private $cTE = '';             //cantidad de egresados en la empresa
	private $nombreEgresado = "";  
	private $cNE = '';            //cumplimiento de las Normas de la empresa
	private $rCTA = '';           //responsabilidad en el cumplimiento de tareas asignadas
	private $pET = '';            //puntualidad en el trabajo
	private $rI = '';			  //relaciones interpersonales
	private $mLOE = '';           //manejo del lenguaje oral y escrito
	private $cETA = '';           //compromiso efectivo con las tareas asignadas
	private $pCTA = '';           //puntualidad en el cumplimiento de tareas asignadas
	private $iET = '';            //integración a equipos de trabajo
	private $mASI = '';           //manejo ante situaciones imprevistas
	private $cMI = '';            //confidencialidad en el manejo de información
	private $aEDE = '';           //adecuación a las exigencias de la empresa
	private $uDLT = '';           //uso del lenguaje  técnico
	private $mDTAP = '';          //muestra dominio teórico-práctico en el área profesionaL
	private $cDIC = '';			  //capacidad de innovación y creatividad
	private $cDTR = '';           //calidad del trabajo realizado
	private $cDA = '';            //capacidad de análisis
	private $fESI = '';           //funcionabilidad en las soluciones implementadas
	private $preferencia = '';
	private $razon = '';
	private $recomendacion = '';
	
	function __get( $prop ) {
		if(isset($this->$prop)) {
			return $this->$prop;
		}
		
	}
	
	function __set( $prop, $val ) {
		if ( isset ( $this->$prop ) ) {
			$this->$prop = $val;
		}
		
	}
}
?>