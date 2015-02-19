@extends('master.layout')

<?php
    if ($trabajadores->exists):
        $form_data = array('route' => array('trabajadores.update', $trabajadores->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'trabajadores.store', 'method' => 'POST');
        $action    = 'Agregar';        
    endif;
?>
@section ('title') {{ $action }} trabajador | @stop
@section('content')
  
	{{ Form::model($trabajadores, $form_data, array('role' => 'form')) }}
  <legend><h3 class="form-signin-heading">{{ $action }} trabajador</h3></legend>
  @include ('admin/errors', array('errors' => $errors))
    
    @if($action == "Agregar")
      <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
      <input type="hidden" name="update_user" value="{{ Auth:: user()->id }}">
    @else 
      <input type="hidden" name="update_user" value="{{ Auth:: user()->id }}">
    @endif
    <div class="row">
      <div class="col-md-6">
        {{ Form::label('nombre', 'Nombres:') }} 
        {{ Form::text('nombre', null, array('class' => 'form-control', 'placeholder' =>'Nombre del trabajador', 'autofocus'=>'autofocus')) }}
      </div>
      <div class="col-md-6">
        {{ Form::label('apellido', 'Apellidos:') }}
        {{ Form::text('apellido', null, array('class' => 'form-control', 'placeholder' =>'Apellido del trabajador')) }}
      </div>
      <div class="col-md-3">
        {{ Form::label('ci', 'C.I.:') }}
        {{ Form::text('ci', null, array('class' => 'form-control', 'placeholder' =>'Cédula de identidad del trabajador')) }}
      </div>
      <div class="col-md-2">
        {{ Form::label('edad', 'Edad:') }}
        {{ Form::text('edad', null, array('class' => 'form-control', 'placeholder' =>'Edad del trabajador')) }}
      </div>
      <div class="col-md-4">
        {{ Form::label('sexo', 'Sexo:') }}
        {{ Form::select('sexo', array(
        'm' => 'Masculino',
        'f' => 'Femenino'), null, ['class' => 'form-control']) }}
      </div>
      <div class="col-md-4">
        {{ Form::label('fecha_n', 'Fecha de Nacimiento:') }}
        {{ Form::input('date', 'fecha_n', null, array('class' => 'form-control', 'placeholder' => 'dd/mm/aaaa', 'autofocus'=>'autofocus')) }}
      </div>
      <div class="col-md-3">
        {{ Form::label('nacionalidad', 'Nacionalidad:') }}
        {{ Form::text('nacionalidad', null, array('class' => 'form-control', 'placeholder' =>'Nacionalidad del Trabajador')) }}
      </div>
      <div class="col-md-12">
        {{ Form::label('direccion', 'Dirección:') }}
        {{ Form::text('direccion', null, array('class' => 'form-control', 'placeholder' =>'Dirección del trabajador')) }}
      </div>
      <div class="col-md-4">
        {{ Form::label('tlf', 'Teléfono:') }}
        {{ Form::text('tlf', null, array('class' => 'form-control', 'placeholder' =>'Teléfono local del trabajador')) }}
      </div>
      <div class="col-md-4">
        {{ Form::label('cel', 'Celular:') }}
        {{ Form::text('cel', null, array('class' => 'form-control', 'placeholder' =>'Celular del trabajador')) }}
      </div>
      <div class="col-md-4">
        {{ Form::label('email', 'Email:') }}
        {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' =>'Correo del trabajador')) }}
      </div>
      <div class="col-md-4">
        {{ Form::label('rif', 'RIF:') }}
        {{ Form::text('rif', null, array('class' => 'form-control', 'placeholder' =>'Registro de información fiscal del trabajador')) }}
      </div>
      <div class="col-md-4">
        {{ Form::label('fecha_i', 'Fecha de ingreso:') }}
        {{ Form::input('date', 'fecha_i', null, array('class' => 'form-control', 'placeholder' => 'dd/mm/aaaa', 'autofocus'=>'autofocus')) }}
      </div>
      <div class="col-md-4">
        {{ Form::label('cargo', 'Cargo:') }}
        {{ Form::text('cargo', null, array('class' => 'form-control', 'placeholder' =>'Cargo del trabajador')) }}
      </div>
      <div class="col-md-4">
        {{ Form::label('asegurado', 'Asegurado:') }}
        {{ Form::select('asegurado', array(
        'si' => 'Si',
        'no' => 'No'), null, ['class' => 'form-control']) }}
      </div>
      <div class="col-md-4">
        {{ Form::label('tipo', 'Tipo de Trabajador:') }}
        {{ Form::select('tipo', array(
        'empleado' => 'Empleado',
        'accionista' => 'Accioniste'), null, ['class' => 'form-control']) }}
      </div>
      <div class="col-md-4">
        {{ Form::label('sueldo', 'Sueldo Base:') }}
        {{ Form::text('sueldo', null, array('class' => 'form-control', 'placeholder' =>'Sueldo del trabajador')) }}
      </div>
      <div class="col-md-4">
        {{ Form::label('sueldo_otro', 'Sueldo Base + Bonos:') }}
        {{ Form::text('sueldo_otro', null, array('class' => 'form-control', 'placeholder' =>'Sueldo del trabajador')) }}
      </div>
      <div class="col-md-4">
        {{ Form::label('ct', 'Cesta Ticket:') }}
        {{ Form::text('ct', null, array('class' => 'form-control', 'placeholder' =>'Cesta Ticket del trabajador')) }}
      </div>
      <div class="col-md-4">
        {{ Form::label('estatus', 'Estatus:') }}
        {{ Form::select('estatus', array(
          '' => 'Seleccionar',
          'activo' => 'Activo',
          'retirado' => 'Retirado'), null, ['class' => 'form-control']) }}
      </div>
    </div>   
    <br>     
    @if($action == 'Agregar')
      {{ Form::button($action.' trabajador', array('type' => 'submit', 'class' => 'btn btn-success')) }}
    @else 
      {{ Form::button($action.' trabajador', array('type' => 'submit', 'class' => 'btn btn-warning')) }}
    @endif
   
  {{ Form::close() }}
  <p>
    @if ($action == 'Editar')  
      {{ Form::model($trabajadores, array('route' => array('trabajadores.destroy', $trabajadores->id), 'method' => 'DELETE', 'role' => 'form')) }}
        <div class="row">
          <div class="form-group col-md-4">
              {{ Form::submit('Eliminar agente', array('class' => 'btn btn-danger')) }}
          </div>
        </div>
      {{ Form::close() }}
    @endif
  </p>

@stop