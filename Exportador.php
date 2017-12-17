<?php
	
	require('fpdf/fpdf.php');
	require('fpdf/fpdi.php');
	
	class Exportador {
		
		public function exportar( Evaluacion $evaluacion ) {
		$fecha = strtotime($evaluacion->fechaReporte);
		$dia = date('j',$fecha);
		$mes = date('m',$fecha);
		$anio = date('y',$fecha);
		$pdf =& new FPDI();
		$pdf->AddPage();
		$pdf->setSourceFile('pdf/Encuesta_Evaluacion.pdf');
		$tplIdx = $pdf->importPage(1);
		$pdf->useTemplate($tplIdx, 10, 10, 200);
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetFont('Arial', 'B', 10);
		if ($dia < 10) {
			$pdf->SetXY(50, 40);
			$pdf->Write(0, '0');
			$pdf->SetXY(55, 40);
			$pdf->Write(0, $dia);	
		}
		else{
			$pdf->SetXY(50, 40);
			$pdf->Write(0, floor($dia/10));
			$pdf->SetXY(55, 40);
			$pdf->Write(0, ($dia % 10) );	
		}
		if ($mes < 10) {
			$pdf->SetXY(66, 40);
			$pdf->Write(0, '0');
			$pdf->SetXY(72, 40);
			$pdf->Write(0, $mes);	
		}
		else{
			$pdf->SetXY(66, 40);
			$pdf->Write(0, floor($mes/10));
			$pdf->SetXY(72, 40);
			$pdf->Write(0, ($mes % 10));	
		}
		$pdf->SetXY(94, 40);
		$pdf->Write(0, (floor($anio/10) % 10));
		$pdf->SetXY(100, 40);
		$pdf->Write(0, ($anio % 10));
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->SetXY(55, 55);
		
			$sector = $evaluacion->sector;
			$NombreEmpresa = $evaluacion->nombreEmpresa;
			$NombrePasante = $evaluacion->nombreEgresado;
			$CG1 = $evaluacion->cNE;	
			$CG2 = $evaluacion->rCTA;
			$CG3 = $evaluacion->pET;
			$CG4 = $evaluacion->rI;
			$CG5 = $evaluacion->mLOE;
			$CD1 = $evaluacion->cETA;
			$CD2 = $evaluacion->pCTA;
			$CD3 = $evaluacion->iET;
			$CD4 = $evaluacion->mASI;
			$CD5 = $evaluacion->cMI;
			$CD6 = $evaluacion->aEDE;
			$HT1 = $evaluacion->uDLT;
			$HT2 = $evaluacion->mDTAP;
			$HT3 = $evaluacion->cDIC;
			$HT4 = $evaluacion->cDTR;
			$HT5 = $evaluacion->cDA;
			$HT6 = $evaluacion->fESI;
			$Preferencia = $evaluacion->preferencia;
			$Razones = $evaluacion->razon;
			$Observacion = $evaluacion->recomendacion;
		
		$pdf->Write(0, $NombreEmpresa);
		$pdf->SetFont('Arial', 'B', 14);
		switch ($sector) {
			case 'Publico':
				$pdf->SetXY(145, 37.5);
				$pdf->Write(0, 'x');
				break;
			
			case 'Privado':
				$pdf->SetXY(171.5, 38);
				$pdf->Write(0, 'x');
				break;
			
			case 'Multinacional':
				$pdf->SetXY(172, 46);
				$pdf->Write(0, 'x');
				break;
			
			case 'Zona Franca':
				$pdf->SetXY(143, 46);
				$pdf->Write(0, 'x');
				break;
			
			default:
				# code...
				break;
		}
		$pdf->SetXY(40,90);
		$pdf->Write(0, $NombrePasante);
		switch ($CG1) {
			case 'Excelente':
				$pdf->SetXY(105, 124);
				$pdf->Write(0, 'x');
				break;
			
			case 'Muy Bueno':
				$pdf->SetXY(124, 125);
				$pdf->Write(0, 'x');
				break;
			
			case 'Bueno':
				$pdf->SetXY(143, 125);
				$pdf->Write(0, 'x');
				break;
			
			case 'Regular':
				$pdf->SetXY(161, 124);
				$pdf->Write(0, 'x');
				break;
			
			case 'Deficiente':
				$pdf->SetXY(178, 124);
				$pdf->Write(0, 'x');
				break;

			case 'No aplica':
				$pdf->SetXY(194, 124);
				$pdf->Write(0, 'x');
				break;
			
			default:
				# code...
				break;
		}
		switch ($CG2) {
			case 'Excelente':
				$pdf->SetXY(105, 130);
				$pdf->Write(0, 'x');
				break;
			
			case 'Muy Bueno':
				$pdf->SetXY(125, 130);
				$pdf->Write(0, 'x');
				break;
			
			case 'Bueno':
				$pdf->SetXY(144, 130);
				$pdf->Write(0, 'x');
				break;
			
			case 'Regular':
				$pdf->SetXY(163, 130);
				$pdf->Write(0, '.');
				break;
			
			case 'Deficiente':
				$pdf->SetXY(178, 132);
				$pdf->Write(0, 'x');
				break;

			case 'No Aplica':
				$pdf->SetXY(194, 130);
				$pdf->Write(0, 'x');
				break;
			
			default:
				# codex..
				break;
		}
		switch ($CG3) {
			case 'Excelente':
				$pdf->SetXY(105, 138);
				$pdf->Write(0, 'x');
				break;
			
			case 'Muy Bueno':
				$pdf->SetXY(125, 138);
				$pdf->Write(0, 'x');
				break;
			
			case 'Bueno':
				$pdf->SetXY(144, 138);
				$pdf->Write(0, 'x');
				break;
			
			case 'Regular':
				$pdf->SetXY(163, 138);
				$pdf->Write(0, 'x');
				break;
			
			case 'Deficiente':
				$pdf->SetXY(178, 138);
				$pdf->Write(0, 'x');
				break;

			case 'No Aplica':
				$pdf->SetXY(194, 138);
				$pdf->Write(0, 'x');
				break;
			
			default:
				# code...
				break;
		}
		switch ($CG4) {
			case 'Excelente':
				$pdf->SetXY(105, 144);
				$pdf->Write(0, 'x');
				break;
			
			case 'Muy Bueno':
				$pdf->SetXY(125, 144);
				$pdf->Write(0, 'x');
				break;
			
			case 'Bueno':
				$pdf->SetXY(144, 144);
				$pdf->Write(0, 'x');
				break;
			
			case 'Regular':
				$pdf->SetXY(163, 144);
				$pdf->Write(0, 'x');
				break;
			
			case 'Deficiente':
				$pdf->SetXY(178, 144);
				$pdf->Write(0, 'x');
				break;

			case 'No Aplica':
				$pdf->SetXY(194, 144);
				$pdf->Write(0, 'x');
				break;
			
			default:
				# code...
				break;
		}
		switch ($CG5) {
			case 'Excelente':
				$pdf->SetXY(105, 149);
				$pdf->Write(0, 'x');
				break;
			
			case 'Muy Bueno':
				$pdf->SetXY(125, 149);
				$pdf->Write(0, 'x');
				break;
			
			case 'Bueno':
				$pdf->SetXY(144, 149);
				$pdf->Write(0, 'x');
				break;
			
			case 'Regular':
				$pdf->SetXY(163, 149);
				$pdf->Write(0, 'x');
				break;
			
			case 'Deficiente':
				$pdf->SetXY(178, 149);
				$pdf->Write(0, 'x');
			break;

			case 'No Aplica':
				$pdf->SetXY(194, 149);
				$pdf->Write(0, 'x');
				break;
			
			default:
				# code...
				break;
		}
		switch ($CD1) {
			case 'Excelente':
				$pdf->SetXY(105, 155);
				$pdf->Write(0, 'x');
				break;
			
			case 'Muy Bueno':
				$pdf->SetXY(125, 155);
				$pdf->Write(0, 'x');
				break;
			
			case 'Bueno':
				$pdf->SetXY(144, 155);
				$pdf->Write(0, 'x');
				break;
			
			case 'Regular':
				$pdf->SetXY(163, 155);
				$pdf->Write(0, 'x');
				break;
			
			case 'Deficiente':
				$pdf->SetXY(178, 155);
				$pdf->Write(0, 'x');
				break;

			case 'No Aplica':
				$pdf->SetXY(194, 155);
				$pdf->Write(0, 'x');
				break;
			
			default:
				# code...
				break;
		}
		switch ($CD2) {
			case 'Excelente':
				$pdf->SetXY(105, 161);
				$pdf->Write(0, 'x');
				break;
			
			case 'Muy Bueno':
				$pdf->SetXY(125, 161);
				$pdf->Write(0, 'x');
				break;
			
			case 'Bueno':
				$pdf->SetXY(144, 161);
				$pdf->Write(0, 'x');
				break;
			
			case 'Regular':
				$pdf->SetXY(163, 161);
				$pdf->Write(0, 'x');
				break;
			
			case 'Deficiente':
				$pdf->SetXY(178, 161);
				$pdf->Write(0, 'x');
				break;

			case 'No Aplica':
				$pdf->SetXY(194, 161);
				$pdf->Write(0, 'x');
				break;
			
			default:
				# code...
				break;
		}
		switch ($CD3) {
			case 'Excelente':
				$pdf->SetXY(105, 167);
				$pdf->Write(0, 'x');
				break;
			
			case 'Muy Bueno':
				$pdf->SetXY(125, 167);
				$pdf->Write(0, 'x');
				break;
			
			case 'Bueno':
				$pdf->SetXY(144, 167);
				$pdf->Write(0, 'x');
				break;
			
			case 'Regular':
				$pdf->SetXY(163, 167);
				$pdf->Write(0, 'x');
				break;
			
			case 'Deficiente':
				$pdf->SetXY(178, 167);
				$pdf->Write(0, 'x');
				break;

			case 'No Aplica':
				$pdf->SetXY(194, 167);
				$pdf->Write(0, 'x');
				break;
			
			default:
				# code...
				break;
		}
		switch ($CD4) {
			case 'Excelente':
				$pdf->SetXY(105, 173);
				$pdf->Write(0, 'x');
				break;
			
			case 'Muy Bueno':
				$pdf->SetXY(125, 173);
				$pdf->Write(0, 'x');
				break;
			
			case 'Bueno':
				$pdf->SetXY(144, 173);
				$pdf->Write(0, 'x');
				break;
			
			case 'Regular':
				$pdf->SetXY(163, 173);
				$pdf->Write(0, 'x');
				break;
			
			case 'Deficiente':
				$pdf->SetXY(178, 173);
				$pdf->Write(0, 'x');
				break;

			case 'No Aplica':
				$pdf->SetXY(194, 173);
				$pdf->Write(0, 'x');
				break;
			
			default:
				# code...
				break;
		}
		switch ($CD5) {
			case 'Excelente':
				$pdf->SetXY(105, 178);
				$pdf->Write(0, 'x');
				break;
			
			case 'Muy Bueno':
				$pdf->SetXY(125, 178);
				$pdf->Write(0, 'x');
				break;
			
			case 'Bueno':
				$pdf->SetXY(144, 178);
				$pdf->Write(0, 'x');
				break;
			
			case 'Regular':
				$pdf->SetXY(163, 178);
				$pdf->Write(0, 'x');
				break;
			
			case 'Deficiente':
				$pdf->SetXY(178, 178);
				$pdf->Write(0, 'x');
				break;

			case 'No Aplica':
				$pdf->SetXY(194, 178);
				$pdf->Write(0, 'x');
				break;
			
			default:
				# code...
				break;
		}
		switch ($CD6) {
			case 'Excelente':
				$pdf->SetXY(105, 184);
				$pdf->Write(0, 'x');
				break;
			
			case 'Muy Bueno':
				$pdf->SetXY(125, 184);
				$pdf->Write(0, 'x');
				break;
			
			case 'Bueno':
				$pdf->SetXY(144, 184);
				$pdf->Write(0, 'x');
				break;
			
			case 'Regular':
				$pdf->SetXY(163, 184);
				$pdf->Write(0, 'x');
				break;
			
			case 'Deficiente':
				$pdf->SetXY(178, 184);
				$pdf->Write(0, 'x');
				break;

			case 'No Aplica':
				$pdf->SetXY(194, 184);
				$pdf->Write(0, 'x');
				break;
			
			default:
				# code...
				break;
		}
		switch ($HT1) {
			case 'Excelente':
				$pdf->SetXY(105, 191);
				$pdf->Write(0, 'x');
				break;
			
			case 'Muy Bueno':
				$pdf->SetXY(125, 191);
				$pdf->Write(0, 'x');
				break;
			
			case 'Bueno':
				$pdf->SetXY(144, 191);
				$pdf->Write(0, 'x');
				break;
			
			case 'Regular':
				$pdf->SetXY(163, 191);
				$pdf->Write(0, 'x');
				break;
			
			case 'Deficiente':
				$pdf->SetXY(178, 191);
				$pdf->Write(0, 'x');
				break;

			case 'No Aplica':
				$pdf->SetXY(194, 191);
				$pdf->Write(0, 'x');
				break;
			
			default:
				# code...
				break;
		}
		switch ($HT2) {
			case 'Excelente':
				$pdf->SetXY(105, 198);
				$pdf->Write(0, '.');
				break;
			
			case 'Muy Bueno':
				$pdf->SetXY(125, 198);
				$pdf->Write(0, 'x');
				break;
			
			case 'Bueno':
				$pdf->SetXY(144, 198);
				$pdf->Write(0, 'x');
				break;
			
			case 'Regular':
				$pdf->SetXY(163, 198);
				$pdf->Write(0, 'x');
				break;
			
			case 'Deficiente':
				$pdf->SetXY(178, 198);
				$pdf->Write(0, 'x');
				break;

			case 'No Aplica':
				$pdf->SetXY(194, 198);
				$pdf->Write(0, 'x');
				break;
			
			default:
				# code...
				break;
		}
		switch ($HT3) {
			case 'Excelente':
				$pdf->SetXY(105, 205);
				$pdf->Write(0, 'x');
				break;
			
			case 'Muy Bueno':
				$pdf->SetXY(125, 205);
				$pdf->Write(0, 'x');
				break;
			
			case 'Bueno':
				$pdf->SetXY(144, 205);
				$pdf->Write(0, 'x');
				break;
			
			case 'Regular':
				$pdf->SetXY(163, 205);
				$pdf->Write(0, 'x');
				break;
			
			case 'Deficiente':
				$pdf->SetXY(178, 205);
				$pdf->Write(0, 'x');
				break;

			case 'No Aplica':
				$pdf->SetXY(194, 205);
				$pdf->Write(0, 'x');
				break;
			
			default:
				# code...
				break;
		}
		switch ($HT4) {
			case 'Excelente':
				$pdf->SetXY(105, 211);
				$pdf->Write(0, 'x');
				break;
			
			case 'Muy Bueno':
				$pdf->SetXY(125, 211);
				$pdf->Write(0, 'x');
				break;
			
			case 'Bueno':
				$pdf->SetXY(144, 211);
				$pdf->Write(0, 'x');
				break;
			
			case 'Regular':
				$pdf->SetXY(163, 211);
				$pdf->Write(0, 'x');
				break;
			
			case 'Deficiente':
				$pdf->SetXY(178, 211);
				$pdf->Write(0, 'x');
				break;

			case 'No Aplica':
				$pdf->SetXY(194, 211);
				$pdf->Write(0, 'x');
				break;
			
			default:
				# code...
				break;
		}
		switch ($HT5) {
			case 'Excelente':
				$pdf->SetXY(105, 217);
				$pdf->Write(0, 'x');
				break;
			
			case 'Muy Bueno':
				$pdf->SetXY(125, 217);
				$pdf->Write(0, 'x');
				break;
			
			case 'Bueno':
				$pdf->SetXY(144, 217);
				$pdf->Write(0, 'x');
				break;
			
			case 'Regular':
				$pdf->SetXY(163, 217);
				$pdf->Write(0, 'x');
				break;
			
			case 'Deficiente':
				$pdf->SetXY(178, 217);
				$pdf->Write(0, 'x');
				break;

			case 'No Aplica':
				$pdf->SetXY(194, 217);
				$pdf->Write(0, 'x');
				break;
			
			default:
				# code...
				break;
		}
		switch ($HT6) {
			case 'Excelente':
				$pdf->SetXY(105, 223);
				$pdf->Write(0, 'x');
				break;
			
			case 'Muy Bueno':
				$pdf->SetXY(125, 223);
				$pdf->Write(0, 'x');
				break;
			
			case 'Bueno':
				$pdf->SetXY(144, 223);
				$pdf->Write(0, 'x');
				break;
			
			case 'Regular':
				$pdf->SetXY(163, 223);
				$pdf->Write(0, 'x');
				break;
			
			case 'Deficiente':
				$pdf->SetXY(178, 223);
				$pdf->Write(0, 'x');
				break;

			case 'No Aplica':
				$pdf->SetXY(194, 223);
				$pdf->Write(0, 'x');
				break;
			
			default:
				# codex..
				break;
		}
		$pdf->AddPage();
		$tplIdx = $pdf->importPage(2);
		$pdf->useTemplate($tplIdx, 10, 10, 200);
		$pdf->SetFont('Arial', 'B', 18);
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(10, 50);
		if ($Preferencia == 'itla') {
			$pdf->SetXY(15, 48.5);
			$pdf->SetFont('Arial', 'B', 18);
			$pdf->Write(0, 'x');
		}
		else{
			$pdf->SetXY(15, 58.5);
			$pdf->SetFont('Arial', 'B', 18);
			$pdf->Write(0, 'x');
		}
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->SetXY(50, 60);
		$pdf->Write(0, $Razones);
		$pdf->SetXY(30, 140);
		$pdf->Write(0, $Observacion);
		$pdf->Output(('exportados/'.$NombrePasante.'.pdf'));
		
		}
		
	}
?>