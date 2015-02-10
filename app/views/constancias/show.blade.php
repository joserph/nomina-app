@extends ('master.layout')
@section ('content')

    <legend><h3>Constancia de {{ $constancias->nombre }}</h3></legend>
    
  <blockquote>
  <dl class="dl-horizontal">
    <dt>Nombre:</dt>
    <dd>{{ $constancias->nombre }}</dd>
    <dt>C.I.:</dt>
    <dd>{{ $constancias->ci }}</dd>
    <dt>Fecha de Ingreso:</dt>
    <dd>{{ $constancias->fecha_ingreso }}</dd>
    <dt>Cargo:</dt>
    <dd>{{ $constancias->cargo }}</dd>
    <dt>Sueldo:</dt>
    <dd>{{ $constancias->sueldo }}</dd>
    <dt>Fecha de Constancia:</dt>
    <dd>{{ $constancias->fecha }}</dd>
    <dt>Representante Legal:</dt>
    <dd>{{ $constancias->id_representante }}</dd>
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
     
@stop