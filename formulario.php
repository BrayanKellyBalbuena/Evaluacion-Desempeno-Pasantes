<?php

	require('libs/Administrador.php');
	verificarUsuario();
	
	if(isset($_SESSION['usrAdmin'])) {
		include ("plantillas/plantilla_admin.php");
	}elseif(isset($_SESSION['Usuario'])) {
		include("plantillas/plantilla_usuario.php");
	}
	
	$admin = new Administrador();
	$evaluacion = new Evaluacion();
	
	if($_POST) {
		$evaluacion->fechaReporte = $_POST['txtFecha'];
		$evaluacion->sector = $_POST['txtSector'];
		$evaluacion->nombreEmpresa = $_POST['txtNombreEmpresa'];
		$evaluacion->egresados = $_POST['txtPasante'];
		$evaluacion->cTE = $_POST['txtCantidad'];
		$evaluacion->nombreEgresado = $_POST['txtNombrePasante'];
		$evaluacion->cNE = $_POST['txtCNE'];
		$evaluacion->rCTA = $_POST['txtRCTA'];
		$evaluacion->pET = $_POST['txtPET'];
		$evaluacion->rI = $_POST['txtRI'];
		$evaluacion->mLOE = $_POST['txtMLOE'];
		$evaluacion->cETA = $_POST['txtCETA'];
		$evaluacion->iET = $_POST['txtIET'];
		$evaluacion->mASI = $_POST['txtMASI'];
		$evaluacion->cMI = $_POST['txtCMI'];
		$evaluacion->mDTAP = $_POST['txtMDTAP'];
		$evaluacion->cDIC = $_POST['txtCDIC'];
		$evaluacion->cDTR = $_POST['txtCDTR'];
		$evaluacion->cDA = $_POST['txtCDA'];
		$evaluacion->fESI = $_POST['txtFESI'];
		$evaluacion->preferencia = $_POST['txtPreferencia'];
		$evaluacion->razon = $_POST['txtRazon'];
		$evaluacion->recomendacion = $_POST['txtRecomendacion'];
	    var_dump($evaluacion->sector);
		var_dump($evaluacion->nombreEgresado);
		
		$admin->registrarEvaluacion($evaluacion);
	}
	
?>

<br/>
<form id="formEgresado" action ="" method="post">
  <table width="80%"  align="center" >
    <tr>
      <th colspan="2" bgcolor="#2c99de" style="font-weight: 40; font-style: normal; color: #FFF;" scope="col">
      <h3>Encuesta de Evaluación de Desempeño de Pasantes</h3></th>
    </tr>
    <tr>
    	<td>FECHA DE REPORTE</td>
        <td><input name="txtFecha" type="date" required id="txtFecha" autocomplete="on"/></td>
    </tr>
    <tr>
      <td  >SECTOR: </td>
      <td >
        <select name="txtSector" required id="selectSector">
          <option selected="selected">Público</option>
          <option>Privado</option>
          <option>Zona Franca</option>
          <option>Multinacional</option>
      </select></td>
    </tr>
    <tr>
      <td >NOMBRE DE LA<br>
      EMPRESA:</td>
      <td >
      <input name="txtNombreEmpresa" type="text" required id="txtNombreEmpresa" autocomplete="on"></td>
    </tr>
    <tr>
      <td >¿Tiene usted algún(a, os, as) egresado(a, os, as)<br>
        de ITLA como pasante en su empresa o<br>
      institución?</td>
      <td ><input type="radio" name="txtPasante" id="radio" value="si">
      <label for="txtPasante">Si 
        &nbsp;&nbsp;<input type="radio" name="txtPasante" id="radio2" value="no">
      No </label></td>
    </tr>
    <tr>
      <td >¿Cuántos? </td>
      <td >
        &nbsp;&nbsp;<select name="txtCantidad" required id="txtCantidad">
          <option>1 - 5</option>
          <option>6 - 10</option>
          <option>11 - 15</option>
          <option>20 - 25</option>
          <option>26 - 40</option>
          <option>41 - 60</option>
          <option>61 - 100</option>
          <option>+100</option>
      </select></td>
    </tr>
    <tr>
      <td >Nombre del (de la) Pasante</td>
      <td >
      <input name="txtNombrePasante" type="text" required id="textNombrePasante" autocomplete="on"></td>
    <tr>
      	 <th colspan="2" bgcolor="#2c99de" style="font-weight: 200; font-style: normal; color: #FFF;" scope="col">
         <h4>Para las preguntas en la tabla siguiente, utilice un formulario por pasante. Llene cada casilla considerando los aspectos<br>
   	     generalmente mostrados por dicha persona.</h4></th>
    </tr>
    <tr>
      <td colspam="1" scope="col">&nbsp;</td>
      <td colspam="1" scope="col">&nbsp;</td>
    </tr>
    <tr>
      <th colspan="2" bgcolor="#2c99de" style="font-style: normal; font-weight: normal; color: #FFF;" scope="col">
      <h5> Criterios generales</h5></th>
    </tr>
    <tr>
      <td colspam="1" scope="col">Cumplimiento de las Normas de la empresa</td>
      <td colspam="1" scope="col">
        <select name="txtCNE" required id="txtCNE">
          <option selected="selected">Excelente</option>
          <option>Muy Bueno</option>
          <option>Bueno</option>
          <option>Regular</option>
          <option>Deficiente</option>
          <option>No aplica</option>
      </select></td>
    </tr>
    <tr>
      <td colspam="1" scope="col">Responsabilidad en el cumplimiento de tareas asignadas</td>
      <td colspam="1" scope="col">
        <select name="txtRCTA" required id="txtRCTA">
          <option selected="selected">vehiculo</option>
          <option>Muy Bueno</option>
          <option>Bueno</option>
          <option>Regular</option>
          <option>Deficiente</option>
          <option>No aplica</option>
      </select></td>
    </tr>
    <tr>
      <td colspam="1" scope="col">Puntualidad en el trabajo</td>
      <td colspam="1" scope="col">
        <select name="txtPET" required id="select">
          <option selected="selected">Excelente</option>
          <option>Muy Bueno</option>
          <option>Bueno</option>
          <option>Regular</option>
          <option>Deficiente</option>
          <option>No aplica</option>
      </select></td>
    </tr>
    <tr>
      <td colspam="1" scope="col">Relaciones interpersonales</td>
      <td colspam="1" scope="col">
        <select name="txtRI" required id="select">
          <option selected="selected">Excelente</option>
          <option>Muy Bueno</option>
          <option>Bueno</option>
          <option>Regular</option>
          <option>Deficiente</option>
          <option>No aplica</option>
      </select></td>
    </tr>
    <tr>
      <td >Manejo del lenguaje oral y escrito</td>
      <td >
        <select name="txtMLOE" required id="select">
          <option selected="selected">Excelente</option>
          <option>Muy Bueno</option>
          <option>Bueno</option>
          <option>Regular</option>
          <option>Deficiente</option>
          <option>No aplica</option>
      </select></td>
    </tr>
    <tr>
      <th >&nbsp;</th>
      <th >&nbsp;</th>
    </tr>
    <tr>
      <th colspan="2" bgcolor="#2c99de" style="font-style: normal; font-weight: normal; color: #FFF;" scope="col">
      <h5>Criterios de desempeño laboral<br></h5></th>
    </tr>
    <tr>
      <td colspam="1" scope="col">Compromiso efectivo con las tareas asignadas</td>
      <td colspam="1" scope="col">
        <select name="txtCETA" required id="select">
          <option selected="selected">Excelente</option>
          <option>Muy Bueno</option>
          <option>Bueno</option>
          <option>Regular</option>
          <option>Deficiente</option>
          <option>No aplica</option>
      </select></td>
    </tr>
    <tr>
     <td colspam="1" scope="col">Puntualidad en el cumplimiento de tareas asignadas</td>
      <td colspam="1" scope="col">
        <select name="txtPCTA" required id="select">
          <option selected="selected">Excelente</option>
          <option>Muy Bueno</option>
          <option>Bueno</option>
          <option>Regular</option>
          <option>Deficiente</option>
          <option>No aplica</option>
      </select></td>
    </tr>
    <tr>
     <td colspam="1" scope="col">Integración a equipos de trabajo</td>
      <td colspam="1" scope="col">
        <select name="txtIET" required id="select">
          <option selected="selected">Excelente</option>
          <option>Muy Bueno</option>
          <option>Bueno</option>
          <option>Regular</option>
          <option>Deficiente</option>
          <option>No aplica</option>
      </select></td>
    </tr>
    <tr>
      <td colspam="1" scope="col">Manejo ante situaciones imprevistas</td>
      <td colspam="1" scope="col">
        <select name="txtMASI" required id="select">
          <option selected="selected">Excelente</option>
          <option>Muy Bueno</option>
          <option>Bueno</option>
          <option>Regular</option>
          <option>Deficiente</option>
          <option>No aplica</option>
      </select></td>
    </tr>
    <tr>
      <td colspam="1" scope="col">Confidencialidad en el manejo de información</td>
      <td colspam="1" scope="col">
        <select name="txtCMI" required id="select">
          <option selected="selected">Excelente</option>
          <option>Muy Bueno</option>
          <option>Bueno</option>
          <option>Regular</option>
          <option>Deficiente</option>
          <option>No aplica</option>
      </select></td>
    </tr>
    <tr>
      <td colspam="1" scope="col">Adecuación a las exigencias de la empresa</td>
      <td colspam="1" scope="col">
        <select name="txtAEDE" required id="select">
          <option selected="selected">Excelente</option>
          <option>Muy Bueno</option>
          <option>Bueno</option>
          <option>Regular</option>
          <option>Deficiente</option>
          <option>No aplica</option>
      </select></td>
    </tr>
    <tr>
      <th colspam="1" scope="col">&nbsp;</th>
      <th colspam="1" scope="col">&nbsp;</th>
    </tr>
    <tr>
     <tr>
      <th colspan="2" bgcolor="#2c99de" style="font-style: normal; font-weight: normal; color: #FFF;" scope="col">
      <h3>Habilidades Tecnicas<br></h3></th>
  
    <tr>
     <td colspam="1" scope="col">Uso del lenguaje  técnico<br></td>
      <td colspam="1" scope="col">
        <select name="txtUDLT" required id="select">
          <option selected="selected">Excelente</option>
          <option>Muy Bueno</option>
          <option>Bueno</option>
          <option>Regular</option>
          <option>Deficiente</option>
          <option>No aplica</option>
      </select></td>
    </tr>
    <tr>
      <td colspam="1" scope="col">Muestra dominio teórico-práctico en el área profesional<br></td>
      <td colspam="1" scope="col">
        <select name="txtMDTAP" required id="select">
          <option selected="selected">Excelente</option>
          <option>Muy Bueno</option>
          <option>Bueno</option>
          <option>Regular</option>
          <option>Deficiente</option>
          <option>No aplica</option>
      </select></td>
    </tr>
    <tr>
     <td colspam="1" scope="col">Capacidad de innovación y creatividad</td>
      <td colspam="1" scope="col">
        <select name="txtCDIC" required id="select">
          <option selected="selected">Excelente</option>
          <option>Muy Bueno</option>
          <option>Bueno</option>
          <option>Regular</option>
          <option>Deficiente</option>
          <option>No aplica</option>
      </select></td>
    </tr>
    <tr>
      <td colspam="1" scope="col">Calidad del trabajo realizado</td>
      <td colspam="1" scope="col">
        <select name="txtCDTR" required id="select">
          <option selected="selected">Excelente</option>
          <option>Muy Bueno</option>
          <option>Bueno</option>
          <option>Regular</option>
          <option>Deficiente</option>
          <option>No aplica</option>
      </select></td>
    </tr>
    <tr>
      <td colspam="1" scope="col">Capacidad de análisis</td>
      <td colspam="1" scope="col">
        <select name="txtCDA" required id="select">
          <option selected="selected">Excelente</option>
          <option>Muy Bueno</option>
          <option>Bueno</option>
          <option>Regular</option>
          <option>Deficiente</option>
          <option>No aplica</option>
      </select></td>
    </tr>
    <tr>
      <td colspam="1" scope="col">Funcionabilidad en las soluciones implementadas</td>
      <td colspam="1" scope="col">
        <select name="txtFESI" required id="select">
          <option selected="selected">Excelente</option>
          <option>Muy Bueno</option>
          <option>Bueno</option>
          <option>Regular</option>
          <option>Deficiente</option>
          <option>No aplica</option>
      </select></td>
    </tr>
    <tr>
      <td >En condiciones de igualdad de competencia, si tuviera que escoger entre un(a) egresado(a) de ITLA y otra institución,¿cuál escogería?</td>
      <td ><input name="txtPreferencia" type="radio" required id="radio3" value="itla">
        <label for="txtPreferencia">ITLA
          <input name="txtPreferencia" type="radio" required id="radio4" value="otro">
      Otras </label></td>
    </tr>
    <tr>
      <th colspan="2" scope="col"><table width="545" border="1" cellpadding="1">
        <tr>
          <th bgcolor="#2c99de" style="color: #FFF">Explicar brevemente razones de su respuesta</th>
        </tr>
        <tr>
          <th ><textarea name="txtRazon" cols="88" rows="9" required id="razon"></textarea></th>
        </tr>
      </table>
      <br/></th>
    </tr>
    <tr>
      <th   colspan="2" scope="col"><table width="545" border="1" cellpadding="1">
        <tr>
          <th bgcolor="#2c99de" style="color: #FFF">Recomendaciones / Observaciones / Comentarios</th>
        </tr>
        <tr>
          <th><textarea name="txtRecomendacion" cols="88" rows="9" required id="recomendaciones"></textarea></th>
        </tr>
      </table>
      <br/></th>
    </tr>
    
    <tr>
      <td colspan="2" scope="col">&nbsp;<p align = "center">
      	<input class = "button raduis" type="submit" value="Enviar"/>&nbsp;&nbsp;
        &nbsp;<input class = "button raduis"  type="reset" value="Limpiar Campos"/>
        </p>
      </td>
    </tr>
  </table>
</form>
	<script src = "fundation/js/vendor/jquery.js" ></script>
		<script src ="fundation/js/foundation.min.js"></script>
		<script>
			$(document).foundation();
		</script>
