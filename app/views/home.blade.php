@extends('master.layout')

@section('content')

<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <div class="panel panel-primary">
      <a href="{{ route('empresas.index') }}">
        <div class="panel-heading">
          <h3 class="panel-title text-center"><i class="fa fa-building-o fa-5x"></i></h3>
        </div>
        <div class="panel-body text-center">
          Empresa
        </div>
      </a>
    </div>
  </div>
  
 	<div class="col-md-6 col-md-offset-3">
  	<div class="panel panel-primary">
      <a href="{{ route('trabajadores.index') }}">
  		  <div class="panel-heading">
    			<h3 class="panel-title text-center"><i class="fa fa-users fa-5x"></i></h3>
  			</div>
	  		<div class="panel-body text-center">
	    		Trabajadores
	  		</div>
      </a>
		</div>
  </div>

	<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-primary">
      <a href="{{ route('recibos.index') }}">
        <div class="panel-heading">
          <h3 class="panel-title text-center"><i class="fa fa-file-text fa-5x"></i></h3>
        </div>
        <div class="panel-body text-center">
          Recibos
        </div>
      </a>
    </div>
  </div>
</div>
@stop