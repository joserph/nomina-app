@extends('master.layout')

<?php
    if ($empresa->exists):
        $form_data = array('route' => array('empresas.update', $empresa->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'empresas.store', 'method' => 'POST');
        $action    = 'Agregar';        
    endif;
?>
@section ('title') {{ $action }} empresa | @stop
@section('content')
  
  <legend><h3 class="form-signin-heading">{{ $action }} empresa</h3></legend>
	{{ Form::model($empresa, $form_data, array('role' => 'form')) }}
  
  @include ('admin/errors', array('errors' => $errors))
    
    @if($action == "Agregar")
      <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
      <input type="hidden" name="update_user" value="{{ Auth:: user()->id }}">
    @else 
      <input type="hidden" name="update_user" value="{{ Auth:: user()->id }}">
    @endif
    <div class="row">
      <div class="col-md-4">
        {{ Form::label('nombre', 'Nombre:') }}
        {{ Form::text('nombre', null, array('class' => 'form-control', 'placeholder' => 'Nombre de la Empresa', 'autofocus')) }}
      </div>
      <div class="col-md-4">
        {{ Form::label('rif', 'RIF:') }}
        {{ Form::text('rif', null, array('class' => 'form-control', 'placeholder' =>'RIF de la Empresa')) }}
      </div>
      <div class="col-md-2">
        {{ Form::label('tlf', 'Teléfono:') }}
        {{ Form::text('tlf', null, array('class' => 'form-control', 'placeholder' =>'Teléfono de la Empresa')) }}
      </div>
      <div class="col-md-8">
        {{ Form::label('direccion', 'Dirección:') }}
        {{ Form::text('direccion', null, array('class' => 'form-control', 'placeholder' =>'Direccion Fiscal de la Empresa')) }}
      </div>
    </div>   
    <br>     
    @if($action == 'Agregar')
      {{ Form::button($action.' empresa', array('type' => 'submit', 'class' => 'btn btn-success')) }}
    @else 
      {{ Form::button($action.' empresa', array('type' => 'submit', 'class' => 'btn btn-warning')) }}
    @endif
   
  {{ Form::close() }}
  <p>
    @if ($action == 'Editar')  
      {{ Form::model($empresa, array('route' => array('empresas.destroy', $empresa->id), 'method' => 'DELETE', 'role' => 'form')) }}
        <div class="row">
          <div class="form-group col-md-4">
              {{ Form::submit('Eliminar empresa', array('class' => 'btn btn-danger')) }}
          </div>
        </div>
      {{ Form::close() }}
    @endif
  </p>

@stop