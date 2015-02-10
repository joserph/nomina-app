<?php

class PdfController extends BaseController {


	public function getIndex($id)
	{
		$pagos = DB::table('pagos')->where('id_recibo', '=', $id)->get();
		$trabajadores = Trabajador::all();
		$recibo = Recibo::find($id);
		$conceptos = Concepto::all();
		$asigdedus = DB::table('asigdedus')->where('id_recibo', '=', $id)->get();
		$empresa = DB::table('empresas')->first();
		$pdf = PDF::loadView('reciboPdf', array(
			'pagos' => $pagos,
			'trabajadores' => $trabajadores,
			'recibo' => $recibo,
			'conceptos' => $conceptos,
			'asigdedus' => $asigdedus,
			'empresa' => $empresa
			))->setPaper('Carta');
		return $pdf->stream();
	}

	/*public function getIndexIslr($id)
	{
		$reportesislr = Reporteislr::find($id);
		$facturasislr = DB::table('facturasislr')->where('id_reporteislr', '=', $id)->get();
		$agentes = Agente::find(1);
		$proveedores = Empleado::all();
		$pdf = PDF::loadView('pdfislr', array(
			'reportesislr' => $reportesislr, 
			'facturasislr' => $facturasislr, 
			'agentes' => $agentes,
			'proveedores' => $proveedores
			))->setPaper('Carta')->setOrientation('landscape');
		return $pdf->stream();
	}*/

}
