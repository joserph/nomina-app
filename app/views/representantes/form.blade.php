@extends('master.layout')

<?php
    if ($representantes->exists):
        $form_data = array('route' => array('representantes.update', $representantes->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'representantes.store', 'method' => 'POST');
        $action    = 'Agregar';        
    endif;
?>
@section ('title') {{ $action }} representante @stop
@section('content')
  
	{{ Form::model($representantes, $form_data, array('role' => 'form')) }}
  <legend><h3 class="form-signin-heading">{{ $action }} representante</h3></legend>
  @include ('admin/errors', array('errors' => $errors))
    
    @if($action == "Agregar")
      <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
      <input type="hidden" name="update_user" value="{{ Auth:: user()->id }}">
    @else 
      <input type="hidden" name="update_user" value="{{ Auth:: user()->id }}">
    @endif
    <div class="row">
      <div class="col-md-12">
        {{ Form::label('nombre', 'Nombre:') }}
        {{ Form::text('nombre', null, array('class' => 'form-control', 'placeholder' =>'Nombre del Representante de la Empresa')) }}
      </div>
      <div class="col-md-12">
        {{ Form::label('ci', 'C.I.:') }}
        {{ Form::text('ci', null, array('class' => 'form-control', 'placeholder' =>'Cedula del Representante de la Empresa')) }}
      </div>
      <div class="col-md-12">
        {{ Form::label('cargo', 'Cargo:') }}
        {{ Form::text('cargo', null, array('class' => 'form-control', 'placeholder' =>'Cargo del Representante de la Empresa')) }}
      </div>
    </div>   
    <br>     
    @if($action == 'Agregar')
      {{ Form::button($action.' representante', array('type' => 'submit', 'class' => 'btn btn-success')) }}
    @else 
      {{ Form::button($action.' representante', array('type' => 'submit', 'class' => 'btn btn-warning')) }}
    @endif
   
  {{ Form::close() }}
  <p>
    @if ($action == 'Editar')  
      {{ Form::model($representantes, array('route' => array('representantes.destroy', $representantes->id), 'method' => 'DELETE', 'role' => 'form')) }}
        <div class="row">
          <div class="form-group col-md-4">
              {{ Form::submit('Eliminar agente', array('class' => 'btn btn-danger')) }}
          </div>
        </div>
      {{ Form::close() }}
    @endif
  </p>

@stop