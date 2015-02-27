<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);

		body {
			margin:0;
			font-family:'Lato', sans-serif;
			color: #000;
		}
		div.row{
			margin-left: 100px;
		}
		div.titulo1{
			margin-left: 55px;
			margin-top: -53px;
		}
		p.titulo{
			padding-bottom: -10px;
			font-size: 9px;
		}
		div.titulo2{
			margin-left: 500px;
			padding-top: -50px;
		}
		h1{
			font-size: 15px;
		}
		div.pagina{
			margin-left: 1070px;
			padding-top: -50px;
		}
		p.forma{
			margin-bottom: 5px;
			text-align: right;
			font-size: 9px;
		}
		table.tabla1, th.tabla1, td.tabla1, table.info, th.info, td.info, table.periodo, th.periodo, td.periodo, table.fecha, th.fecha, td.fecha, table.principal, th.principal, td.principal, table.pie, th.pie, td.pie{
			border: 1px solid black;
			border-collapse: collapse;
		}
		tr.tabla2{
			border: 1px solid black;
		}
		th.tabla1{
			padding-left: 16px;
			padding-right: 16px;
			background-color: #040195;
			color: #fff;
			font-size: 9px;
		}
		td.tabla1{
			text-align: center;
			font-size: 9px;
			padding: 3px;
		}
		div.info{
			margin-top: 10px;
		}
		th.info, th.periodo, th.fecha, th.pie{
			font-size: 9px;
			color: #fff;
			background-color: #040195;
			text-align: center;
		}
		th.principal{
			font-size: 7px;
			color: #fff;
			background-color: #040195;
			text-align: center;
		}
		td.principal{
			font-size: 8px;
			text-align: center;
			padding-top: 5px;
			padding-bottom: 5px;
		}
		td.info, td.periodo, td.fecha, td.pie{
			font-size: 9px;
			text-align: center;
			padding-right: 15px;
			padding-left: 15px;
			padding-top: 2px;
			padding-bottom: 2px;
		}
		table.periodo{
			margin-left: 100px;
			padding-top: 10px;
			
		}
		table.fecha{
			margin-left: 500px;
			padding-top: -46px;
			
		}
		th.p2, th.f2, th.pr2, th.pi3{
			background-color: #FFE8B0;
			color: #000;
		}
		td.f4{
			padding-left: 50px;
			padding-right: 50px;
		}
		div.principal{
			margin-top: 10px;
		}
		th.pr3{
			width: 90px;
		}
		th.pr4{
			font-size: 7px;
			width: 50px;
		}
		th.pr5{
			width: 50px;
		}
		td.pr6{
			text-transform: uppercase;
			font-size: 6px;
		}
		th.pr7{
			width: 120px;
		}
		th.pi2{
			color: #000;
			background-color: #fff;
		}
		th.pi4{
			text-align: left;
		}
		th.pi5{
			text-align: center;
		}
		th.pi6{
			width: 250px;
		}
		footer{
			margin-top: 160px;
		}
		p.legal{
			font-size: 7.5px;
			text-align: center;
		}
		p.legal2{
			font-size: 8px;
			text-align: center;
		}
		p.legal3{
			text-align: center;
			color: blue;
			text-decoration: underline;
			font-size: 10px;
		}
		.in2{
			text-transform: uppercase;
		}
	</style>
</head>
<body>
	<div class="row">
		<img src="assets/img/ivss.jpg" alt="">
		<div class="titulo1">
			<p class="titulo">REPÚBLICA BOLIVARIANA DE VENEZUELA</p>
			<p class="titulo">MINISTERIO DEL PODER POPULAR  PARA EL TRABAJO Y SEGURIDAD SOCIAL</p>
			<p class="titulo">INSTITULO VENEZOLANO DE LOS SEGUROS SOCIALES</p>
		</div>
		<div class="titulo2">
			<h1>REGISTRO PATRONAL DE ASEGURADOS</h1>
		</div>
		<div class="pagina">
			<p class="forma">Forma: 13-12</p>
			<table class="tabla1">
				<tr>
					<th class="tabla1" colspan="3">PÁGINA Nº</th>
				</tr>
				<tr>
					<td class="tabla1">1</td>
					<td class="tabla1">DE</td>
					<td class="tabla1">1</td>
				</tr>
			</table>
		</div>
		<div class="info">
			<table class="info" style="width:100%">
				<tr>
					<th class="info">RAZÓN SOCIAL DE LA EMPRESA O NOMBRE DEL EMPLEADOR</th>
					<th class="info">Nº DE R.I.F.</th>
					<th class="info">DOMICILIO FISCAL DE LA EMPRESA U ORGANISMO PÚBLICO</th>
					<th class="info">Nº PATRONAL</th>
				</tr>
				<tr>
					<td class="info in2">{{ $empresa->nombre }}</td>
					<td class="info in2">{{ $empresa->rif }}</td>
					<td class="info in2">{{ $empresa->direccion }}</td>
					<td class="info">D15884205</td>
				</tr>
			</table>
		</div>
		<div class="periodo">
			<table class="periodo">
				<tr>
					<th class="periodo p3" colspan="6">PERIODO COMPRENDIDO ENTRE LAS FECHAS</th>
				</tr>
				<tr>
					<th class="periodo p2">DÍA</th>
					<th class="periodo p2">MES</th>
					<th class="periodo p2">AÑO</th>
					<th class="periodo p2">DÍA</th>
					<th class="periodo p2">MES</th>
					<th class="periodo p2">AÑO</th>
				</tr>
				<tr>
					<td class="periodo">{{ date("d", strtotime($nomina->desde)) }}</td>
					<td class="periodo">{{ date("m", strtotime($nomina->desde)) }}</td>
					<td class="periodo">{{ date("Y", strtotime($nomina->desde)) }}</td>
					<td class="periodo">{{ date("d", strtotime($nomina->hasta)) }}</td>
					<td class="periodo">{{ date("m", strtotime($nomina->hasta)) }}</td>
					<td class="periodo">{{ date("Y", strtotime($nomina->hasta)) }}</td>
				</tr>
			</table>
			<table class="fecha">
				<tr>
					<th class="fecha f3" colspan="3">FECHA DE INSCRIPCIÓN</th>
					<th class="fecha f3" rowspan="2">RÉGIMEN</th>
					<th class="fecha f3" rowspan="2">RIESGO</th>
				</tr>
				<tr>
					<th class="fecha f2">DÍA</th>
					<th class="fecha f2">MES</th>
					<th class="fecha f2">AÑO</th>
				</tr>
				<tr>
					<td class="fecha">29</td>
					<td class="fecha">05</td>
					<td class="fecha">2003</td>
					<td class="fecha f4"></td>
					<td class="fecha">Mínino</td>
				</tr>
			</table>
		</div>
		<div class="principal">
			<table class="principal" style="width:100%">
				<tr>
					<th class="principal pr3" rowspan="2">APELLIDOS Y NOMBRES</th>
					<th class="principal pr4" colspan="2">NACIONALIDAD</th>
					<th class="principal" rowspan="2">CÉDULA DE IDENTIDAD Nº</th>
					<th class="principal pr4" colspan="3">FECHA DE NACIMIENTO</th>
					<th class="principal pr4" colspan="2">SEXO</th>
					<th class="principal pr7" rowspan="2">DIRECCIÓN DEL TRABAJADOR</th>
					<th class="principal" rowspan="2">Nº DE REGISTRO EN EL IVSS</th>
					<th class="principal pr4" colspan="3">FECHA DE INGRESO</th>
					<th class="principal pr4" colspan="3">FECHA DE RETIRO</th>
					<th class="principal pr3" colspan="3">SALARIO O SUELDO</th>
					<th class="principal pr4" rowspan="2">COTIZACIÓN SEMANAL DEL TRABAJADOR (IVSS)</th>
					<th class="principal pr4" rowspan="2">APORTE SEMANAL DEL EMPLEADOR (IVSS)</th>
					<th class="principal pr4" rowspan="2">TOTALES APORTES AL IVSS</th>
					<th class="principal pr4" rowspan="2">COTIZACIÓN SEMANAL DEL TRABAJADOR POR R.P.E.</th>
					<th class="principal pr4" rowspan="2">APORTE SEMANAL DEL EMPLEADOR POR R.P.E.</th>
					<th class="principal pr4" rowspan="2">TOTALES APORTES POR R.P.E.</th>
					<th class="principal" rowspan="2">OCUPACIÓN U OFICIO</th>
					<th class="principal" rowspan="2">OTRO</th>
				</tr>
				<tr>
					<th class="principal pr2">V</th>
					<th class="principal pr2">E</th>
					<th class="principal pr2">DÍA</th>
					<th class="principal pr2">MES</th>
					<th class="principal pr2">AÑO</th>
					<th class="principal pr2">F</th>
					<th class="principal pr2">M</th>
					<th class="principal pr2">DÍA</th>
					<th class="principal pr2">MES</th>
					<th class="principal pr2">AÑO</th>
					<th class="principal pr2">DÍA</th>
					<th class="principal pr2">MES</th>
					<th class="principal pr2">AÑO</th>
					<th class="principal pr2">DIARIO</th>
					<th class="principal pr2">SEMANAL</th>
					<th class="principal pr2">MENSUAL</th>
				</tr>
				@foreach($detallesIvss as $detalles)
				<tr>
					<td class="principal pr6">{{ $detalles->apellido }} {{ $detalles->nombre }}</td>
					@if($detalles->nacionalidad == 'Venezolano')
						<td class="principal">X</td>
						<td class="principal"></td>
					@else
						<td class="principal"></td>
						<td class="principal">X</td>
					@endif
					<td class="principal">{{ number_format($detalles->ci,0,",",".") }}</td>
					<td class="principal">{{ date("d", strtotime($detalles->fecha_n)) }}</td>
					<td class="principal">{{ date("m", strtotime($detalles->fecha_n)) }}</td>
					<td class="principal">{{ date("y", strtotime($detalles->fecha_n)) }}</td>
					@if($detalles->sexo == 'f')
						<td class="principal">X</td>
						<td class="principal"></td>
					@else
						<td class="principal"></td>
						<td class="principal">X</td>
					@endif
					<td class="principal pr6">{{ $detalles->direccion }}</td>
					<td class="principal">V-0{{ $detalles->ci }}</td>
					<td class="principal">{{ date("d", strtotime($detalles->fecha_i)) }}</td>
					<td class="principal">{{ date("m", strtotime($detalles->fecha_i)) }}</td>
					<td class="principal">{{ date("y", strtotime($detalles->fecha_i)) }}</td>
					<td class="principal"></td>
					<td class="principal"></td>
					<td class="principal"></td>
					<?php
						$diario = (($detalles->sueldo * 12)/52)/7;
						$semanal = ($detalles->sueldo * 12)/52;
						$cstivss = ($semanal * 4)/100;
						$aseivss = ($semanal * 10)/100;
						$taivss = $cstivss + $aseivss;
						$cstrpe = ($semanal * 0.5)/100;
						$aserpe = ($semanal * 2)/100;
						$tarpe = $cstrpe + $aserpe;
					?>
					<td class="principal">{{ number_format($diario,2,",",".") }}</td>
					<td class="principal">{{ number_format($semanal,2,",",".") }}</td>
					<td class="principal">{{ number_format($detalles->sueldo,2,",",".") }}</td>
					<td class="principal">{{ number_format($cstivss,2,",",".") }}</td>
					<td class="principal">{{ number_format($aseivss,2,",",".") }}</td>
					<td class="principal">{{ number_format($taivss,2,",",".") }}</td>
					<td class="principal">{{ number_format($cstrpe,2,",",".") }}</td>
					<td class="principal">{{ number_format($aserpe,2,",",".") }}</td>
					<td class="principal">{{ number_format($tarpe,2,",",".") }}</td>
					<td class="principal pr6">{{ $detalles->cargo }}</td>
					<td class="principal"></td>
				</tr>
				@endforeach
			</table>
		</div>
		<footer>
			<table class="pie" style="width:100%">
				<tr>
					<th class="pie pi4">OBSERVACIONES:</th>
					<th class="pie pi6" colspan="3">LUGAR</th>
					<th class="pie">NOMBRE Y APELLIDO DEL REPRESENTANTE</th>
					<th class="pie pi2 pi5" rowspan="5"></th>
				</tr>
				<tr>
					<th class="pie pi2 pi4">R.P.E.= RÉGIMEN PRESTACIONAL DE EMPLEO</th>
					<th class="pie pi2" rowspan="2" colspan="3">CARACAS</th>
					<th class="pie pi2 in2" rowspan="2">
						@foreach($representantes as $representante)
							@if($nomina->id_representante == $representante->id)
								{{ $representante->nombre }}
							@endif
						@endforeach
					</th>
				</tr>
				<tr>
					<td class="pie pi2" rowspan="4"></td>
				</tr>
				<tr>
					<th class="pie" colspan="3">FECHA</th>
					<th class="pie">CÉDULA DE IDENTIDAD Nº</th>
				</tr>
				<tr>
					<th class="pie pi3">DÍA</th>
					<th class="pie pi3">MES</th>
					<th class="pie pi3">AÑO</th>
					<th class="pie pi2" rowspan="2">
						@foreach($representantes as $representante)
							@if($nomina->id_representante == $representante->id)
								{{ number_format($representante->ci,0,",",".")}}
							@endif
						@endforeach
					</th>
				</tr>
				<tr>
					<td class="pie">22</td>
					<td class="pie">09</td>
					<td class="pie">2014</td>
					<td class="pie">FIRMA Y SELLO</td>
				</tr>
			</table>
			<p class="legal">ESTE FORMULARIO ES DE USO OBLIGATORIO, DE ACUERDO A LO ESTABLECIDO EN EL ARTÍCULO 87 DEL REGLAMENTO GENERAL DE LA LEY DEL SEGURO SOCIAL Y VÁLIDO PARA SER PRESENTADO ANTE EL SERVIDOR PÚBLICO ACTUANTE AUTORIZADO POR EL IVSS CUANDO LO REQUIERA.</p>
			<p class="legal2"><b>EL FORMULARIO ES COMPLETAMENTE GRATUITO</b></p>
			<p class="legal3">www.ivss.gob.ve</p>

		</footer>
	</div>
	

</body>
</html>
