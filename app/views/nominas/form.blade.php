@extends('master.layout')

<?php
    if ($nominas->exists):
        $form_data = array('route' => array('nominas.update', $nominas->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'nominas.store', 'method' => 'POST');
        $action    = 'Crear';        
    endif;
?>
@section ('title') {{ $action }} nómina @stop
@section('content')
  
	{{ Form::model($nominas, $form_data, array('role' => 'form')) }}
  <legend><h3 class="form-signin-heading">{{ $action }} nómina</h3></legend>
  @include ('admin/errors', array('errors' => $errors))
    
    @if($action == "Crear")
      <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
      <input type="hidden" name="update_user" value="{{ Auth:: user()->id }}">
    @else 
      <input type="hidden" name="update_user" value="{{ Auth:: user()->id }}">
    @endif
    <div class="row">
     
      <div class="col-md-6">
        {{ Form::label('desde', 'Desde:') }}
        {{ Form::input('date', 'desde', null, array('class' => 'form-control', 'placeholder' => 'dd/mm/aaaa')) }}
      </div>
      <div class="col-md-6">
        {{ Form::label('hasta', 'Hasta:') }}
        {{ Form::input('date', 'hasta', null, array('class' => 'form-control', 'placeholder' => 'dd/mm/aaaa')) }}
      </div>
      <div class="col-md-6">
        {{ Form::label('riesgo', 'Riesgo:') }}
        {{ Form::select('riesgo', array(
        'minimo' => 'Mínimo',
        'medio' => 'Medio',
        'alto' => 'Alto'), null, ['class' => 'form-control']) }}
      </div>
      
      <input type="hidden" name="id_empresa" class="form-control" value="{{ $empresa->id }}">
     
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
      {{ Form::button($action.' nómina', array('type' => 'submit', 'class' => 'btn btn-success')) }}
    @else 
      {{ Form::button($action.' nómina', array('type' => 'submit', 'class' => 'btn btn-warning')) }}
    @endif
   
  {{ Form::close() }}
  <p>
    @if ($action == 'Editar')  
      {{ Form::model($nominas, array('route' => array('nominas.destroy', $nominas->id), 'method' => 'DELETE', 'role' => 'form')) }}
        <div class="row">
          <div class="form-group col-md-4">
              {{ Form::submit('Eliminar agente', array('class' => 'btn btn-danger')) }}
          </div>
        </div>
      {{ Form::close() }}
    @endif
  </p>

@stop