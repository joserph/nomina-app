@extends ('master.layout')
@section ('content')

   	<legend><h3><i class="fa fa-building fa-fw"></i> {{ $empresa->nombre }}</h3></legend>
   	<ol class="breadcrumb">
	   	<li><a href="{{ URL::route('home') }}">Inicio</a></li>
	    <li><a href="{{ route('empresas.index') }}">{{ $empresa->nombre }}</a></li>
	    <li class="active">{{ $empresa->nombre }}</li>
	</ol>
	<blockquote>
	<dl class="dl-horizontal">
		<dt>Nombre:</dt>
		<dd>{{ $empresa->nombre }}</dd>
		<dt>RIF:</dt>
		<dd>{{ $empresa->rif }}</dd>
		<dt>Teléfono:</dt>
		<dd>{{ $empresa->tlf }}</dd>
		<dt>Dirección:</dt>
		<dd>{{ $empresa->direccion }}</dd>
		<dt>Nº Patronal IVSS:</dt>
		<dd>{{ $empresa->n_patronal }}</dd>
		<dt>Fecha Incripción IVSS:</dt>
		<dd>{{ date("d/m/Y", strtotime($empresa->f_incripcion)) }}</dd>
	</dl>
	<small><strong>Creado el 
		<cite title="Source Title">
			{{ date("d/m/Y H:i:s a", strtotime($empresa->created_at)) }}
		</cite>
		 por 
		<cite>
			@foreach($users as $user)
	            @if($user->id == $empresa->id_user)
	                {{ $user->username }}
	            @endif
	        @endforeach
		</cite>
		</strong>
	</small>
	<small><strong>Ultima actualización el 
		<cite title="Source Title">
			{{ date("d/m/Y H:i:s a", strtotime($empresa->updated_at)) }}
		</cite>
		 por 
		<cite>
			@foreach($users as $user)
	            @if($user->id == $empresa->update_user)
	                {{ $user->username }}
	            @endif
	        @endforeach
		</cite>
		</strong>
	</small>
	</blockquote>
     
@stop