@extends('master.layout')

<?php
    if ($recibos->exists):
        $form_data = array('route' => array('recibos.update', $recibos->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'recibos.store', 'method' => 'POST');
        $action    = 'Crear';        
    endif;
?>
@section ('title') {{ $action }} recibo | @stop
@section('content')
  <ol class="breadcrumb">
    <legend><h3><i class="fa fa-edit fa-fw"></i> {{ $action }} recibo</h3></legend>
    <ol class="breadcrumb">
      <li><a href="{{ URL::route('home') }}">Inicio</a></li>
      <li><a href="{{ route('recibos.index') }}">Recibos de Nómina</a></li>
      <li class="active">{{ $action }} recibo</li>
    </ol>
    @include ('admin/errors', array('errors' => $errors))
  	{{ Form::model($recibos, $form_data, array('role' => 'form')) }}

      @if($action == "Crear")
        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
        <input type="hidden" name="update_user" value="{{ Auth:: user()->id }}">
      @else 
        <input type="hidden" name="update_user" value="{{ Auth:: user()->id }}">
      @endif
      <div class="row">
        <div class="col-md-4">
          {{ Form::label('desde', 'Desde:') }}
          {{ Form::input('date', 'desde', null, array('class' => 'form-control', 'placeholder' => 'dd/mm/aaaa', 'autofocus'=>'autofocus')) }}
        </div>
        <div class="col-md-4">
          {{ Form::label('hasta', 'Hasta:') }}
          {{ Form::input('date', 'hasta', null, array('class' => 'form-control', 'placeholder' => 'dd/mm/aaaa')) }}
        </div>
        <div class="col-md-2">
          {{ Form::label('dias_lab', 'Dias Laborables:') }}
          {{ Form::text('dias_lab', null, array('class' => 'form-control', 'placeholder' =>'Dias hábiles')) }}
        </div>
        <div class="col-md-4">
          {{ Form::label('fecha', 'Fecha:') }}
          {{ Form::input('date', 'fecha', null, array('class' => 'form-control', 'placeholder' => 'dd/mm/aaaa')) }}
        </div>
      </div>   
      <br>     
      @if($action == 'Crear')
        {{ Form::button($action.' recibo', array('type' => 'submit', 'class' => 'btn btn-success')) }}
      @else 
        {{ Form::button($action.' recibo', array('type' => 'submit', 'class' => 'btn btn-warning')) }}
      @endif
     
    {{ Form::close() }}
    <p>
      @if ($action == 'Editar')  
        {{ Form::model($recibos, array('route' => array('recibos.destroy', $recibos->id), 'method' => 'DELETE', 'role' => 'form')) }}
          <div class="row">
            <div class="form-group col-md-4">
                {{ Form::submit('Eliminar recibo', array('class' => 'btn btn-danger')) }}
            </div>
          </div>
        {{ Form::close() }}
      @endif
    </p>
  </ol>

@stop