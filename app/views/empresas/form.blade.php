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
  
  <ol class="breadcrumb">
    <legend><h3><i class="fa fa-edit fa-fw"></i> {{ $action }} empresa</h3></legend>
    <ol class="breadcrumb">
      <li><a href="{{ URL::route('home') }}">Inicio</a></li>
      <li><a href="{{ route('empresas.index') }}">{{ $empresa->nombre }}</a></li>
      <li class="active">{{ $action }} empresa</li>
    </ol>
  	{{ Form::model($empresa, $form_data, array('role' => 'form')) }}
    
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
          {{ Form::text('nombre', null, array('class' => 'form-control', 'placeholder' => 'Nombre de la Empresa', 'autofocus')) }}
        </div>
        <div class="col-md-4">
          {{ Form::label('rif', 'RIF:') }}
          {{ Form::text('rif', null, array('class' => 'form-control', 'placeholder' =>'RIF de la Empresa')) }}
        </div>
        <div class="col-md-4">
          {{ Form::label('tlf', 'Teléfono:') }}
          {{ Form::text('tlf', null, array('class' => 'form-control', 'placeholder' =>'Teléfono de la Empresa')) }}
        </div>
        <div class="col-md-12">
          {{ Form::label('direccion', 'Dirección:') }}
          {{ Form::text('direccion', null, array('class' => 'form-control', 'placeholder' =>'Direccion Fiscal de la Empresa')) }}
        </div>
        <div class="col-md-4">
          {{ Form::label('n_patronal', 'Número Patronal:') }}
          {{ Form::text('n_patronal', null, array('class' => 'form-control', 'placeholder' =>'Número Patronal del IVSS')) }}
        </div>
        <div class="col-md-4">
          {{ Form::label('f_incripcion', 'Fecha Incripción IVSS:') }}
          {{ Form::input('date', 'f_incripcion', null, array('class' => 'form-control', 'placeholder' => 'dd/mm/aaaa')) }}
        </div>
      </div>   
      <br>     
      @if($action == 'Agregar')
        {{ Form::button($action.' empresa', array('type' => 'submit', 'class' => 'btn btn-success')) }}
      @else 
        {{ Form::button($action.' empresa', array('type' => 'submit', 'class' => 'btn btn-warning')) }}
      @endif
     
    {{ Form::close() }}
  </ol>

@stop