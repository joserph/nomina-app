@extends('master.layout')

<?php
  if ($asigdedus->exists):
      $form_data = array('route' => array('asigdedu.update', $asigdedus->id), 'method' => 'PATCH');
      $action    = 'Editar';
  else:
      $form_data = array('route' => 'asigdedu.store', 'method' => 'POST');
      $action    = 'Crear';        
  endif;
?>
@section('content')

  {{ Form::model($asigdedus, $form_data, array('role' => 'form')) }}
  @include ('admin/errors', array('errors' => $errors))
  @if($action == "Crear")
    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
    <input type="hidden" name="update_user" value="{{ Auth:: user()->id }}">
    
  @else 
    <input type="hidden" name="update_user" value="{{ Auth:: user()->id }}">
  @endif
  <div class="row">  
    <div class="col-md-2">
      {{ Form::label('faltas_ct', 'Nº Faltas:') }} 
      {{ Form::text('faltas_ct', null, array('class' => 'form-control', 'placeholder' =>'', 'id' => 'faltas_ct1', 'onkeyup' => 'calcular(1)')) }}
    </div>    

    <?php
      $count = 0;
    ?>
    
      @foreach($conceptos as $concepto)        
        
          <div class="col-md-3">
            <label for="">{{ $concepto->descripcion }}</label>
              <select name="asig{{ $count += 1 }}" id="" class="form-control">
                <option value="">Si</option>
                <option value="0">No</option>
              </select>
          </div>
       
      @endforeach
      
  </div>
    <br>     
    @if($action == 'Crear')
      {{ Form::button($action.' pago', array('type' => 'submit', 'class' => 'btn btn-success')) }}
    @else 
      {{ Form::button($action.' pago', array('type' => 'submit', 'class' => 'btn btn-warning')) }}
    @endif
   
  {{ Form::close() }}
  <p>
    @if ($action == 'Editar')  
      {{ Form::model($asigdedus, array('route' => array('asigdedu.destroy', $asigdedus->id), 'method' => 'DELETE', 'role' => 'form')) }}
        <div class="row">
          <div class="form-group col-md-4">
              {{ Form::submit('Eliminar pago', array('class' => 'btn btn-danger')) }}
          </div>
        </div>
      {{ Form::close() }}
    @endif
  </p>

@stop