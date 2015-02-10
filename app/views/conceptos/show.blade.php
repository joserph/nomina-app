@extends ('master.layout')
@section ('content')

    <legend><h3>{{ $conceptos->descripcion }}</h3></legend>
    
  <blockquote>
  <dl class="dl-horizontal">
    <dt>Código:</dt>
    <dd>{{ $conceptos->codigo }}</dd>
    <dt>Descripción:</dt>
    <dd>{{ $conceptos->descripcion }}</dd>
    <dt>Porcentaje:</dt>
    <dd>{{ $conceptos->porcentaje }}</dd>
  </dl>
  <small><strong>Creado el 
    <cite title="Source Title">
      {{ date("d/m/Y H:i:s a", strtotime($conceptos->created_at)) }}
    </cite>
     por 
    <cite>
      @foreach($users as $user)
              @if($user->id == $conceptos->id_user)
                  {{ $user->username }}
              @endif
          @endforeach
    </cite>
    </strong>
  </small>
  <small><strong>Ultima actualización el 
    <cite title="Source Title">
      {{ date("d/m/Y H:i:s a", strtotime($conceptos->updated_at)) }}
    </cite>
     por 
    <cite>
      @foreach($users as $user)
              @if($user->id == $conceptos->update_user)
                  {{ $user->username }}
              @endif
          @endforeach
    </cite>
    </strong>
  </small>
  </blockquote>
     
@stop