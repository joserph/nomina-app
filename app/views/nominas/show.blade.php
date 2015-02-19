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
  
	
@stop