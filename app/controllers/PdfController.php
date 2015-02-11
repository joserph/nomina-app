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

	public function getIndexCons($id)
	{
		$constancia = Constancia::find($id);
		$empresa = Empresa::first();
		$representantes = Representante::all();
		$pdf = PDF::loadView('constanciaPdf', array(
			'constancia' => $constancia,
			'empresa' => $empresa,
			'representantes' => $representantes
			))->setPaper('Carta');
		return $pdf->stream();
	}

}
