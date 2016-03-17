@extends('master.layout')

<?php
    if ($conceptos->exists):
        $form_data = array('route' => array('conceptos.update', $conceptos->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'conceptos.store', 'method' => 'POST');
        $action    = 'Crear';        
    endif;
?>
@section ('title') {{ $action }} Concepto @stop
@section('content')
  
	{{ Form::model($conceptos, $form_data, array('role' => 'form')) }}
  <legend><h3><i class="fa fa-edit fa-fw"></i> {{ $action }} concepto</h3></legend>
  <ol class="breadcrumb">
    <li><a href="{{ URL::route('home') }}">Inicio</a></li>
    <li><a href="{{ route('conceptos.index') }}">Conceptos</a></li>
    <li class="active">{{ $action }} Concepto</li>
  </ol>
  @include ('admin/errors', array('errors' => $errors))
    
    @if($action == "Crear")
      <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
      <input type="hidden" name="update_user" value="{{ Auth:: user()->id }}">
    @else 
      <input type="hidden" name="update_user" value="{{ Auth:: user()->id }}">
    @endif
    <div class="row">
      <div class="col-md-2">
        {{ Form::label('codigo', 'Código:') }}
        {{ Form::text('codigo', null, array('class' => 'form-control', 'placeholder' =>'')) }}
      </div>
      <div class="col-md-8">
        {{ Form::label('descripcion', 'Descripción:') }}
        {{ Form::text('descripcion', null, array('class' => 'form-control', 'placeholder' =>'')) }}
      </div>
      <div class="col-md-2">
        {{ Form::label('porcentaje', 'Porcentaje:') }}
        {{ Form::text('porcentaje', null, array('class' => 'form-control', 'placeholder' =>'')) }}
      </div>
    </div>   
    <br>     
    @if($action == 'Crear')
      {{ Form::button($action.' concepto', array('type' => 'submit', 'class' => 'btn btn-success')) }}
    @else 
      {{ Form::button($action.' concepto', array('type' => 'submit', 'class' => 'btn btn-warning')) }}
    @endif
   
  {{ Form::close() }}
  <p>
    @if ($action == 'Editar')  
      {{ Form::model($conceptos, array('route' => array('conceptos.destroy', $conceptos->id), 'method' => 'DELETE', 'role' => 'form')) }}
        <div class="row">
          <div class="form-group col-md-4">
              {{ Form::submit('Eliminar agente', array('class' => 'btn btn-danger')) }}
          </div>
        </div>
      {{ Form::close() }}
    @endif
  </p>

@stop