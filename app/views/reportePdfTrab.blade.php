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
		p.idRecibo{
			margin-left: 640px;
			font-size: 12px;
			margin-top: -35px;
		}
		h4.empresa{
			margin-left: 60px;
			font-size: 16px;
			margin-bottom: -60px;
		}
		h4.empresa span{
			color: red;
			margin-left: 250px;
		}
		p.rif{
			margin-left: 60px;
			font-size: 10px;
			margin-bottom: -50px;
		}
		p.titulo{
			color: #fff;
			text-align:center;
			font-size: 16px;
			margin: 0 auto;
			border-radius: 5px;
			background-color: #125478;
			width: 250px;
		}
		table.table{
			margin-top: 10px
		}
		table.table, th.table1, td.table1, table.lapso, th.lapso1, td.lapso1, table.desc, th.desc1, th.desc2, th.desc0, table.info, table.info1{
		    border: 1px solid black;
		    border-collapse: collapse;
		}
		td.quincena1, td.quincena0, td.espacio{
			border: 1px solid black;
		}
		th.table1{
			font-size: 11px;
			padding-left: 77px;
			padding-right: 77px;
		}
		td.table1{
			font-size: 12px;
			text-align: center;
		}
		th.lapso1{
			font-size: 11px;
			padding-left: 156.2px;
			padding-right: 156.2px;
		}
		td.lapso1{
			font-size: 12px;
			text-align: center;
		}
		th.desc0{
			font-size: 11px;
			padding-left: 120px;
			padding-right: 120px;
		}
		th.desc1{
			font-size: 11px;
			padding-left: 23.6px;
			padding-right: 23.6px;
		}
		th.desc2{
			font-size: 11px;
			padding-left: 10px;
			padding-right: 10px;
		}
		.espacio{
			padding: 35px 0px 35px 0px;
		}
		td.quincena0{
			font-size: 14px;
		}
		td.quincena1{
			font-size: 12px;
			text-align: center;
		}
		th.total1{
			font-size: 13px;
			text-align: center;
			border: 1px solid black;
		}
		th.info1{
			font-size: 12px;
			padding-left: 20px;
			padding-right: 367px;
			padding-top: 10px;
			padding-bottom: 10px;
			border: 1px solid black;
		}
		th.info2{
			font-size: 12px;
			padding-left: 29px;
			padding-right: 29px;
		}
		th.obser{
			font-size: 12px;
			padding-left: 20px;
			padding-right: 611.5px;
		}
		p.recorte{
			padding-top: 45px;
			padding-bottom: -10px;
		}
		#total{
			background-color: #A8A89F;
		}
		#total2{
			background-color: #A8A89F;
		}
	</style>
</head>
<body>
	<?php
		$cont = 0;
	?>
	@foreach($pagos as $pago)
		<?php
			$cont += 1;
		?>
		<p class="idRecibo">Recibo No. 
			@foreach($trabajadores as $trabajador)
				@if($trabajador->id == $pago->id_trabajador)
					{{ $trabajador->id }}
				@endif
			@endforeach
		</p>
		<h4 class="empresa">{{ $empresa->nombre }} <span>Copia Trabajador</span></h4>
		<p class="rif">RIF.: {{ $empresa->rif }}</p>
		<p class="titulo">RECIBO DE NOMINA</p>
		<table class="table">
			<tr>
				<th class="table1">Nombre del Trabajador</th>
				<th class="table1">Cargo</th>
				<th class="table1">Cedula de Identidad</th>
			</tr>
			<tr>
				@foreach($trabajadores as $trabajador)
					@if($trabajador->id == $pago->id_trabajador)
						<td class="table1">{{ $trabajador->nombre }} {{ $trabajador->apellido }}</td>
						<td class="table1">{{ $trabajador->cargo }}</td>
						<td class="table1">{{ number_format($trabajador->ci,0,",",".") }}</td>
					@endif
				@endforeach
			</tr>
		</table>
		<table class="lapso">
			<tr>
				<th class="lapso1">Desde el:</th>
				<th class="lapso1">Hasta el:</th>
			</tr>
			<tr>
				<td class="lapso1">{{ date("d/m/Y", strtotime($recibo->desde)) }}</td>
				<td class="lapso1">{{ date("d/m/Y", strtotime($recibo->hasta)) }}</td>
			</tr>
		</table>
		
		<table class="desc">
			<tr>
				<th class="desc0">Concepto</th>
				<th class="desc2">Dias/Horas</th>
				<th class="desc1">Asignaciones</th>
				<th class="desc1">Deducciones</th>
				<th class="desc1">Saldo/Acum.</th>
			</tr>
			<tr class="quincena2">
				@foreach($asigdedus as $asigdedu)
					@foreach($conceptos as $concepto)
						@if($pago->asig1 == $asigdedu->id)
							@if($asigdedu->id_concepto == $concepto->id)
								<td class="quincena0">{{ $concepto->codigo }} {{ $concepto->descripcion }}</td>
							@endif
						@endif
					@endforeach
				@endforeach
				
				<td class="quincena1">{{ $pago->dias }}</td>
				<td class="quincena1">{{ number_format($pago->pago,2,",",".") }}</td>
				<td class="quincena1"></td>
				<?php
					$acum = $pago->pago + $pago->pago_ct;
				?>
				<td class="quincena1">{{ number_format($acum,2,",",".") }}</td>
			</tr>
			<tr>
				<td class="espacio"></td>
				<td class="espacio"></td>
				<td class="espacio"></td>
				<td class="espacio"></td>
				<td class="espacio"></td>
			</tr>
			<tr>
				@foreach($asigdedus as $asigdedu)
					@foreach($conceptos as $concepto)
						@if($pago->asig3 == $asigdedu->id)
							@if($asigdedu->id_concepto == $concepto->id)
								<td class="quincena0">{{ $concepto->codigo }} {{ $concepto->descripcion }}</td>
							@endif
						@endif
					@endforeach
				@endforeach
				<td class="quincena1"></td>
				<td class="quincena1"></td>
				<td class="quincena1">{{ number_format($pago->ivss,2,",",".") }}</td>
				<td class="quincena1"></td>
			</tr>
			<tr>
				@foreach($asigdedus as $asigdedu)
					@foreach($conceptos as $concepto)
						@if($pago->asig4 == $asigdedu->id)
							@if($asigdedu->id_concepto == $concepto->id)
								<td class="quincena0">{{ $concepto->codigo }} {{ $concepto->descripcion }}</td>
							@endif
						@endif
					@endforeach
				@endforeach
				<td class="quincena1"></td>
				<td class="quincena1"></td>
				<td class="quincena1">{{ number_format($pago->pf,2,",",".") }}</td>
				<td class="quincena1"></td>
			</tr>
			<tr>
				@foreach($asigdedus as $asigdedu)
					@foreach($conceptos as $concepto)
						@if($pago->asig5 == $asigdedu->id)
							@if($asigdedu->id_concepto == $concepto->id)
								<td class="quincena0">{{ $concepto->codigo }} {{ $concepto->descripcion }}</td>
							@endif
						@endif
					@endforeach
				@endforeach
				<td class="quincena1"></td>
				<td class="quincena1"></td>
				<td class="quincena1">{{ number_format($pago->ph,2,",",".") }}</td>
				<td class="quincena1"></td>
			</tr>
			<tr>
				<?php
					$totalAsig = $pago->pago + $pago->pago_ct;
					$totalDeduc = $pago->ivss + $pago->pf + $pago->ph;
				?>
				<th class="total1" colspan="2">Totales</th>
				<th class="total1">{{ number_format($totalAsig,2,",",".") }}</th>
				<th class="total1">{{ number_format($totalDeduc,2,",",".") }}</th>
				<th class="total1"></th>
			</tr>
			<tr>
				<?php
					$totalPago = $totalAsig - $totalDeduc
				?>
				<th class="total1" colspan="3">Neto a cobrar</th>
				<th class="total1" id="total2">{{ number_format($totalPago,2,",",".") }}</th>
				<th class="total1"></th>
			</tr>
		</table>
		
		<table class="info">
			<tr>
				<th class="info1" colspan="3">Firma del Trabajador</th>
				<th class="info2">Fecha:</th>
				<th class="info2">{{ date("d/m/Y", strtotime($recibo->fecha)) }}</th>
			</tr>
		</table>
		<table class="info1">
			<tr>
				<th class="obser">Observaciones:</th>
			</tr>
		</table>
		@if($cont % 2 != 0)
			<p class="recorte">----------------------------------------------------------------------------------------------------------------------------------------</p>
		@endif		
	@endforeach
</body>
</html>
