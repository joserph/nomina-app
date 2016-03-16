@extends ('master.layout')
@section ('content')

   	<legend><h3>{{ $trabajadores->nombre }} {{ $trabajadores->apellido }}</h3></legend>
   	<ol class="breadcrumb">
    	<li><a href="{{ URL::route('home') }}">Inicio</a></li>
    	<li><a href="{{ route('trabajadores.index') }}">Trabajadores</a></li>
    	<li class="active">{{ $trabajadores->nombre }} {{ $trabajadores->apellido }}</li>
  	</ol>
   	<?php
   		$anioNacimiento = date("Y", strtotime($trabajadores->fecha_n));
   		$anioActual = date("Y");
   		$edad = $anioActual - $anioNacimiento;
   	?>
	<blockquote>
	<dl class="dl-horizontal">
		<dt>Nombre:</dt>
		<dd>{{ $trabajadores->nombre }}</dd>
		<dt>Apellido:</dt>
		<dd>{{ $trabajadores->apellido }}</dd>
		<dt>C.I.:</dt>
		<dd>{{ number_format($trabajadores->ci,0,",",".") }}</dd>
		<dt>Edad:</dt>
		<dd>{{ $edad }}</dd>
		<dt>Fecha de Nacimiento:</dt>
		<dd>{{ date("d/m/Y", strtotime($trabajadores->fecha_n)) }}</dd>
		<dt>Nacionalidad:</dt>
		<dd>{{ $trabajadores->nacionalidad }}</dd>
		<dt>Dirección:</dt>
		<dd>{{ $trabajadores->direccion }}</dd>
		<dt>Teléfono:</dt>
		<dd>{{ $trabajadores->tlf }}</dd>
		<dt>Celular:</dt>
		<dd>{{ $trabajadores->cel }}</dd>
		<dt>Email:</dt>
		<dd>{{ $trabajadores->email }}</dd>
		<dt>RIF:</dt>
		<dd>{{ $trabajadores->rif }}</dd>
		<dt>Fecha Ingreso:</dt>
		<dd>{{ date("d/m/Y", strtotime($trabajadores->fecha_i)) }}</dd>
		<dt>Cargo:</dt>
		<dd>{{ $trabajadores->cargo }}</dd>
		<dt>Sueldo:</dt>
		<dd>{{ number_format($trabajadores->sueldo,2,",",".") }}</dd>
		<dt>Cesta Ticket:</dt>
		<dd>{{ number_format($trabajadores->ct,2,",",".") }}</dd>
	</dl>
	<small><strong>Creado el 
		<cite title="Source Title">
			{{ date("d/m/Y H:i:s a", strtotime($trabajadores->created_at)) }}
		</cite>
		 por 
		<cite>
			@foreach($users as $user)
	            @if($user->id == $trabajadores->id_user)
	                {{ $user->username }}
	            @endif
	        @endforeach
		</cite>
		</strong>
	</small>
	<small><strong>Ultima actualización el 
		<cite title="Source Title">
			{{ date("d/m/Y H:i:s a", strtotime($trabajadores->updated_at)) }}
		</cite>
		 por 
		<cite>
			@foreach($users as $user)
	            @if($user->id == $trabajadores->update_user)
	                {{ $user->username }}
	            @endif
	        @endforeach
		</cite>
		</strong>
	</small>
	</blockquote>
     
@stop