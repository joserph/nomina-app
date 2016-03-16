<!doctype html>
<html lang="es_ES">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
	<style>
		body {
			margin:0;
			font-family:'Lato', Verdana, sans-serif;
			color: #000;
		}
		h1{
			text-align: center;
			font-size: 30px;
			color: #051866;
			text-transform: uppercase;
			
		}
		p.rif, .tlf, .at, .repre, .cargo, .pie, .caduca{
			text-align: center;
			font-size: 13px;
		}
		h3{
			text-align: center;
			margin-top: 30px;
			text-decoration: underline;
			font-style: oblique;
		}
		p.text1, .text2{
			margin-right: 60px;
			margin-left: 60px;
			font-size: 15px;
			margin-top: 50px;
			text-align: justify;
			line-height: 200%;
			text-indent: 40px;
		}p.cargo{
			margin-bottom: 180px;
		}
		span.nombre, .cargo2{
			text-transform: uppercase;
		}
	</style>
</head>
<body>
	<?php
		$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");	 
	?>
	<h1><b>{{ $empresa->nombre }}</b></h1>
	<p class="rif">RIF: {{ $empresa->rif }}</p>
	<p class="tlf">Teléfono: {{ $empresa->tlf }}</p>
	<br>
	<h3>CONSTANCIA DE TRABAJO</h3>
	<br>
	<p class="text1">
		Por medio de la presente hacemos constar que el (la) Sr(a). 
		<span class="nombre"><b>{{ $constancia->nombre }}</b></span>; 
		titular de la Cédula de Identidad No. 
		{{ $constancia->nacionalidad }}.<b>{{ number_format($constancia->ci,0,",",".") }}</b>, 
		presta sus servicios en esta Empresa desde el 
		<b>{{ date("d/m/Y", strtotime($constancia->fecha_ingreso)) }}</b>, 
		ocupando el cargo de 
		<span class="cargo2"><b>{{ $constancia->cargo }}</b></span>, 
		devengando un Ingreso Mensual de Bolívares 
		<b>{{ number_format($constancia->sueldo,2,",",".") }}</b>.
	</p>

	<p class="text2">
		Constancia que se expide a solicitud de la parte interesada en Caracas a los 
		{{ date("d", strtotime($constancia->fecha)) }} 
		días de 
		{{ $meses[date("n", strtotime($constancia->fecha))-1] }} 
		de 
		{{ date("Y", strtotime($constancia->fecha)) }}.
	</p>
	<br>	
	<p class="at">Muy Atentamente,</p>
	<br>	
	<p class="repre">
		@foreach($representantes as $representante)
			@if($representante->id == $constancia->id_representante)
				{{ $representante->nombre }}
			@endif
		@endforeach
	</p>
	<p class="cargo">
		@foreach($representantes as $representante)
			@if($representante->id == $constancia->id_representante)
				{{ $representante->cargo }}
			@endif
		@endforeach
	</p>

	<hr>
	<p class="pie">{{ $empresa->direccion }}. Rif. {{ $empresa->rif }}</p>
	<p class="caduca">Caduca a los 30 días.</p>
</body>
</html>
