@extends ('master.layout')
@section ('content')
  
<legend><h3>Periodo {{ date("d/m/Y", strtotime($nominas->desde)) }} al {{ date("d/m/Y", strtotime($nominas->hasta)) }}</h3></legend>
  
  	<p>Desde: <mark>{{ date("d/m/Y", strtotime($nominas->desde)) }}</mark></p>
  	<p>Hasta: <mark>{{ date("d/m/Y", strtotime($nominas->hasta)) }}</mark></p>
  
	<br>
	<div class="row">
	    <div class="col-md-4">
	      	<a href="{{ route('nominas.edit', $nominas->id) }}" class="btn btn-warning">Editar</a>
	    </div>
	</div>
  	<br>
	<div class="row">
	    <table class="table table-striped table-hover table-responsive">
	      	<tr>
		        <th>#</th>
		        <th class="text-center" >Nombres</th>
		        <th class="text-center" >Apellidos</th>           
		        <th class="text-center" >Nacionalidad</th>
		        <th class="text-center" >Cédula</th>
		        <th class="text-center" >F. Nacimiento</th>           
		        <th class="text-center" >Sexo</th>
		        <th class="text-center" >F. Ingreso</th>
		        <th class="text-center" >S. Mensual</th>           
		        <th class="text-center" >S. Semenal</th>
		        <th class="text-center" >S. Diario</th>       
		        <th class="text-center" >Acciones</th>
	      	</tr>
		    <?php 
		        $cont = 0;
		    ?>
	      	@foreach ($detallesnomi as $detalles)
	        	<td>{{ $cont += 1 }}</td> 
	        	<td>{{ $detalles->nombre }}</td>
	        	<td>{{ $detalles->apellido }}</td>
	        	<td>{{ $detalles->nacionalidad }}</td>
	        	<td>{{ number_format($detalles->ci,0,",",".") }}</td>
	        	<td>{{ date("d/m/Y", strtotime($detalles->fecha_n)) }}</td>
	        	<td class="text-uppercase">{{ $detalles->sexo }}</td>
	        	<td>{{ date("d/m/Y", strtotime($detalles->fecha_i)) }}</td>
	        	<td>{{ number_format($detalles->sueldo,2,",",".") }}</td>
	        	<?php
	        		$semanal = ($detalles->sueldo * 12)/52;
	        		$diario = $semanal/7;
	        	?>
	        	<td>{{ number_format($semanal,2,",",".") }}</td>
	        	<td>{{ number_format($diario,2,",",".") }}</td>
                <td>
                  	
                </td>
	          	</tr>
	      	@endforeach    
	    </table>
  </div> 
  <a href="{{ route('reporteIvss', $nominas->id) }}" target="_blank" class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Generar Nómina</a>
@stop