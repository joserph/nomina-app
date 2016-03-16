@extends ('master.layout')
@section ('content')

    <legend><h3>Constancia de {{ $constancias->nombre }}</h3></legend>
    
  <blockquote>
  <dl class="dl-horizontal">
    <dt>Nombre:</dt>
    <dd class="text-uppercase">{{ $constancias->nombre }}</dd>
    <dt>C.I.:</dt>
    <dd>{{ $constancias->nacionalidad }}{{ number_format($constancias->ci,0,",",".") }}</dd>
    <dt>Fecha de Ingreso:</dt>
    <dd>{{ date("d/m/Y", strtotime($constancias->fecha_ingreso)) }}</dd>
    <dt>Cargo:</dt>
    <dd>{{ $constancias->cargo }}</dd>
    <dt>Sueldo:</dt>
    <dd>{{ number_format($constancias->sueldo,2,",",".") }}</dd>
    <dt>Fecha de Constancia:</dt>
    <dd>{{ date("d/m/Y", strtotime($constancias->fecha)) }}</dd>
    <dt>Representante Legal:</dt>
    <dd>
      @foreach($representantes as $representante)
        @if($representante->id == $constancias->id_representante)
          {{ $representante->nombre }}
        @endif
      @endforeach
    </dd>
  </dl>
  <small><strong>Creado el 
    <cite title="Source Title">
      {{ date("d/m/Y H:i:s a", strtotime($constancias->created_at)) }}
    </cite>
     por 
    <cite>
      @foreach($users as $user)
              @if($user->id == $constancias->id_user)
                  {{ $user->username }}
              @endif
          @endforeach
    </cite>
    </strong>
  </small>
  <small><strong>Ultima actualización el 
    <cite title="Source Title">
      {{ date("d/m/Y H:i:s a", strtotime($constancias->updated_at)) }}
    </cite>
     por 
    <cite>
      @foreach($users as $user)
              @if($user->id == $constancias->update_user)
                  {{ $user->username }}
              @endif
          @endforeach
    </cite>
    </strong>
  </small>
  </blockquote>
  <a href="{{ route('constanciaPdf', $constancias->id) }}" target="_blank" class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Generar Constancia</a>
@stop