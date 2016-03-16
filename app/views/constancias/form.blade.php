@extends('master.layout')

<?php
    if ($constancias->exists):
        $form_data = array('route' => array('constancias.update', $constancias->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'constancias.store', 'method' => 'POST');
        $action    = 'Crear';        
    endif;
?>
@section ('title') {{ $action }} constancia @stop
@section('content')
  
	{{ Form::model($constancias, $form_data, array('role' => 'form')) }}
  <legend><h3 class="form-signin-heading">{{ $action }} constancia</h3></legend>
  @include ('admin/errors', array('errors' => $errors))
    
    @if($action == "Crear")
      <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
      <input type="hidden" name="update_user" value="{{ Auth:: user()->id }}">
    @else 
      <input type="hidden" name="update_user" value="{{ Auth:: user()->id }}">
    @endif
    <div class="row">
      <div class="col-md-12">
        {{ Form::label('nombre', 'Nombre:') }}
        {{ Form::text('nombre', null, array('class' => 'form-control', 'placeholder' =>'Nombre del Trabajador')) }}
      </div>
      <div class="col-md-12">
        {{ Form::label('nacionalidad', 'Nacionalidad:') }}
        {{ Form::select('nacionalidad', array(
        'V-' => 'Venezolano',
        'E-' => 'Extranjero'), null, ['class' => 'form-control']) }}
      </div>
      <div class="col-md-12">
        {{ Form::label('ci', 'C.I.:') }}
        {{ Form::text('ci', null, array('class' => 'form-control', 'placeholder' =>'Cédula del Trabajador')) }}
      </div>
      <div class="col-md-6">
        {{ Form::label('fecha_ingreso', 'Fecha de Ingreso:') }}
        {{ Form::input('date', 'fecha_ingreso', null, array('class' => 'form-control', 'placeholder' => 'dd/mm/aaaa')) }}
      </div>
      <div class="col-md-12">
        {{ Form::label('cargo', 'Cargo:') }}
        {{ Form::text('cargo', null, array('class' => 'form-control', 'placeholder' =>'Cargo del Trabajador')) }}
      </div>
      <div class="col-md-12">
        {{ Form::label('sueldo', 'Sueldo:') }}
        {{ Form::text('sueldo', null, array('class' => 'form-control', 'placeholder' =>'Sueldo Mensual del Trabajador')) }}
      </div>
      <div class="col-md-6">
        {{ Form::label('fecha', 'Fecha de Constancia:') }}
        {{ Form::input('date', 'fecha', null, array('class' => 'form-control', 'placeholder' => 'dd/mm/aaaa')) }}
      </div>
      <div class="col-md-12">
        {{ Form::label('id_representante', 'Representante Legal:') }}
        <select name="id_representante" id="" class="form-control">
          @foreach($representantes as $representante)
            <option value="{{ $representante->id }}">{{ $representante->nombre }}</option>
          @endforeach
        </select>
      </div>
    </div>   
    <br>     
    @if($action == 'Crear')
      {{ Form::button($action.' constancia', array('type' => 'submit', 'class' => 'btn btn-success')) }}
    @else 
      {{ Form::button($action.' constancia', array('type' => 'submit', 'class' => 'btn btn-warning')) }}
    @endif
   
  {{ Form::close() }}
  <p>
    @if ($action == 'Editar')  
      {{ Form::model($constancias, array('route' => array('constancias.destroy', $constancias->id), 'method' => 'DELETE', 'role' => 'form')) }}
        <div class="row">
          <div class="form-group col-md-4">
              {{ Form::submit('Eliminar agente', array('class' => 'btn btn-danger')) }}
          </div>
        </div>
      {{ Form::close() }}
    @endif
  </p>

@stop