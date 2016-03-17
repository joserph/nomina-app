@extends ('master.layout')
@section ('content')

<input type="hidden" value="{{ $totalT }}" id="total">
  
<script type="text/javascript">
  
  function calcular(i)
  {
    total = $('#total').val();

    for(i=0; i <= total; i++)
    {
      faltas = $('#faltas'+i).val();
      if(faltas == '') faltas = 0;

      dl = $('#dl'+i).val();

      ct = dl - faltas;
      $('#ct'+i).val(ct);
    } 
  }

</script>
<legend><h3>Recibos periodo {{ date("d/m/Y", strtotime($recibos->desde)) }} al {{ date("d/m/Y", strtotime($recibos->hasta)) }}</h3></legend>

  <h3>Asignaciones y Deducciones</h3>
  <ul class="list-group">
    @foreach($conceptos as $concepto)
      @foreach($asigdedus as $asigdedu)
        @if($concepto->id == $asigdedu->id_concepto)
          <li class="list-group-item">
            @if($concepto->porcentaje != '')
              <span class="badge">{{ number_format($concepto->porcentaje,2,",",".") }} %</span>
            @endif
            {{ $concepto->codigo }} {{ $concepto->descripcion }}
          </li>       
        @endif
      @endforeach
    @endforeach
  </ul>
  <div class="row">
    <div class="col-md-4">
      <a href="{{ route('recibos.edit', $recibos->id) }}" class="btn btn-warning">Editar</a>
    </div>
  </div>
  <br>
  <div class="row">
    <table class="table table-striped table-hover table-responsive">
      <tr>
        <th>#</th>
        <th>Nombre y Apellido</th>        
        <th>Sueldo Mensual</th>
        <th>IVSS</th>
        <th>PF</th>
        <th>LPH</th>
        <th>D. Laborados</th>
        <th>Cesta Ticket</th>
        <th>Faltas</th>    
        <th>Vales</th>
        <th>D. a Pagar</th>
        <th>Total Pago</th>    
        <th>Acciones</th>
      </tr>
      <?php 
        $cont = 0;
      ?>
      @foreach ($trabajadores as $trabajador)
        @if($trabajador->estatus == "activo")
          <tr>
            
            @foreach($items as $item)
              @if($trabajador->id == $item->id_trabajador)
                <td>{{ $cont += 1 }}</td> 
                <td>{{ $trabajador->nombre }} {{ $trabajador->apellido }}</td> 
                <td>{{ number_format($item->sueldo,2,",",".") }}</td>
                @if($item->asig3 > 0)
                  <td>SI</td>
                @else 
                  <td>NO</td>
                @endif
                @if($item->asig4 > 0)
                  <td>SI</td>
                @else 
                  <td>NO</td>
                @endif
                @if($item->asig5 > 0)
                  <td>SI</td>
                @else 
                  <td>NO</td>
                @endif
                <td>{{ $item->laborados }}</td>
                <td>{{ number_format($item->pago_ct,2,",",".") }}</td>
                <td>{{ $item->faltas_ct }}</td>
                <td>{{ number_format($item->vales,2,",",".") }}</td>
                <td>{{ $item->dias }}</td>
                <td>{{ number_format($item->pago,2,",",".") }}</td>
                <td>
                  <a href="{{ route('pagos.edit', $item->id) }}" class="btn btn-warning btn-xs"> Editar</a>
                </td>
              @endif
            @endforeach
          </tr>
        @endif
      @endforeach    
    </table>
  </div> 
  <a href="{{ route('reportePdf', $recibos->id) }}" target="_blank" class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Generar Recibos</a>
  <a href="{{ route('reportePdfTrab', $recibos->id) }}" target="_blank" class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Generar Recibos Trabajador</a>
@stop