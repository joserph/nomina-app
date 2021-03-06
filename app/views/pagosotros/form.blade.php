@extends('master.layout')

<?php
  if ($pagos->exists):
      $form_data = array('route' => array('pagosotros.update', $pagos->id), 'method' => 'PATCH');
      $action    = 'Editar';
  else:
      $form_data = array('route' => 'pagosotros.store', 'method' => 'POST');
      $action    = 'Crear';        
  endif;
?>
@section('content')
<script>
  $(document).ready(function()
  {    
    $("#faltas_ct1").blur(function()
    {
      faltas_ct = $('#faltas_ct1').val();
      $('#faltas1').val(faltas_ct);
    });

  });
  function calcular(i)
  {
    faltas = $('#faltas'+i).val();
    diasLab = $('#dias_lab'+i).val();
    ct = $('#ct'+i).val();
    vales = 0;  
    sueldo = $('#sueldo'+i).val();
    sueldoDiario = sueldo/30;
    pago = (15 - faltas) * sueldoDiario;
    total = pago - vales;
    $('#pago'+i).val(total); 

    faltas_ct = $('#faltas_ct'+i).val();
    pago_ct = (diasLab - faltas_ct) * ct;
    $('#pago_ct'+i).val(pago_ct);

    totalDias = diasLab - faltas_ct;
    $('#laborados'+i).val(totalDias);

    dias = 15 - faltas;
    $('#dias'+i).val(dias); 
  }
</script>
<script>
  function desactivar()
  {
    if($("#casilla1:checked").val()==1)
    {
      $("#faltas1").attr('readonly', 'readonly');
    }
    else
    {
      $("#faltas1").removeAttr("readonly");
    }
  }
</script>
  <h3>{{ $trabajadores->nombre }} {{ $trabajadores->apellido }}</h3>
  <hr>
  {{ Form::model($pagos, $form_data, array('role' => 'form')) }}
  @include ('admin/errors', array('errors' => $errors))
  <input type="hidden" id="sueldo1" value="{{ $pagos->sueldo }}" onkeyup="calcular(1)">
  <input type="hidden" id="dias_lab1" value="{{ $pagos->dias_lab }}" onkeyup="calcular(1)">
  <input type="hidden" id="ct1" value="{{ $trabajadores->ct }}" onkeyup="calcular(1)">
  @if($action == "Crear")
    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
    <input type="hidden" name="update_user" value="{{ Auth:: user()->id }}">
    
  @else 
    <input type="hidden" name="update_user" value="{{ Auth:: user()->id }}">
  @endif
  <div class="row">  
    <div class="col-md-2">
      {{ Form::label('faltas_ct', 'Faltas Cesta Ticket:') }} 
      {{ Form::text('faltas_ct', null, array('class' => 'form-control', 'placeholder' =>'', 'id' => 'faltas_ct1', 'onkeyup' => 'calcular(1)')) }}
    </div>
    <div class="col-md-3">
      {{ Form::label('faltas', 'Faltas Quincena:') }} 
      {{ Form::text('faltas', null, array('class' => 'form-control', 'placeholder' =>'', 'id' => 'faltas1', 'readonly', 'onkeyup' => 'calcular(1)')) }}
    </div>
    <div class="checkbox col-md-3">
      <input type="checkbox" id="casilla1" value="1" onclick="desactivar()" checked="checked"> Colocar manualmente 
    </div>
    <div class="col-md-4">
      {{ Form::label('vales', 'Vales:') }} 
      {{ Form::text('vales', null, array('class' => 'form-control', 'placeholder' =>'', 'id' => 'vales1', 'onkeyup' => 'calcular(1)')) }}
    </div>
    <div class="col-md-4">
      {{ Form::label('pago', 'Pago Sueldo:') }}
      {{ Form::text('pago', null, array('class' => 'form-control', 'placeholder' =>'Sueldo', 'id' => 'pago1', 'readonly', 'onkeyup' => 'calcular(1)')) }}
    </div>  
    <div class="col-md-4">
      {{ Form::label('pago_ct', 'Pago Cesta Ticket:') }}
      {{ Form::text('pago_ct', null, array('class' => 'form-control', 'placeholder' =>'Sueldo', 'id' => 'pago_ct1', 'readonly', 'onkeyup' => 'calcular(1)')) }}
    </div>
    <input type="hidden" name="laborados" id="laborados1" value="{{ $pagos->laborados }}" onkeyup="calcular(1)"> 
    <input type="hidden" name="dias" id="dias1" value="{{ $pagos->dias }}" onkeyup="calcular(1)">    
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
      {{ Form::model($pagos, array('route' => array('pagosotros.destroy', $pagos->id), 'method' => 'DELETE', 'role' => 'form')) }}
        <div class="row">
          <div class="form-group col-md-4">
              {{ Form::submit('Eliminar pago', array('class' => 'btn btn-danger')) }}
          </div>
        </div>
      {{ Form::close() }}
    @endif
  </p>

@stop