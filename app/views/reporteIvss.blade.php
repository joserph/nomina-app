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
		div.titulo1{
			margin-left: 55px;
			margin-top: -53px;
		}
		p.titulo{
			padding-bottom: -15px;
			font-size: 11px;
		}
		div.titulo2{
			margin-left: 500px;
			padding-top: -50px;
		}
		h1{
			font-size: 20px;
		}
		div.pagina{
			margin-left: 1141px;
			padding-top: -80px;
		}
		p.forma{
			margin-bottom: 5px;
			text-align: right;
		}
		table.tabla1, th.tabla1, td.tabla1, table.info, th.info, td.info, table.periodo, th.periodo, td.periodo, table.fecha, th.fecha, td.fecha{
			border: 1px solid black;
			border-collapse: collapse;
		}
		tr.tabla2{
			border: 1px solid black;
		}
		th.tabla1{
			padding-left: 20px;
			padding-right: 20px;
			background-color: #040195;
			color: #fff;
			font-size: 13px;
		}
		td.tabla1{
			text-align: center;
		}
		div.info{
			margin-top: 10px;
		}
		th.info, th.periodo, th.fecha{
			font-size: 11px;
			color: #fff;
			background-color: #040195;
			text-align: center;
		}
		td.info, td.periodo, td.fecha{
			font-size: 11px;
			text-align: center;
			padding-right: 20px;
			padding-left: 20px;
			padding-top: 2px;
			padding-bottom: 2px;
		}
		table.periodo{
			margin-left: 100px;
			padding-top: 10px;
			
		}
		table.fecha{
			margin-left: 600px;
			padding-top: -54px;
			
		}
		th.p2, th.f2{
			background-color: #FFE8B0;
			color: #000;
		}
		td.f4{
			padding-left: 50px;
			padding-right: 50px;
		}

	</style>
</head>
<body>
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
				<td class="info">DISTRIBUIDORA MEGA-MAXI, C.A.</td>
				<td class="info">J-31010287-2</td>
				<td class="info">CALLE ATRÁS DE ANTIMANO EDIF. LA PRINCESA PISO 1 OF. 8 URB. ANTIMANO.</td>
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
				<td class="periodo">19</td>
				<td class="periodo">09</td>
				<td class="periodo">2014</td>
				<td class="periodo">21</td>
				<td class="periodo">09</td>
				<td class="periodo">2014</td>
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
	

</body>
</html>
