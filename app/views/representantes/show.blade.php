@extends ('master.layout')
@section ('content')

    <legend><h3>{{ $representantes->nombre }}</h3></legend>
    
  <blockquote>
  <dl class="dl-horizontal">
    <dt>Nombre:</dt>
    <dd>{{ $representantes->nombre }}</dd>
    <dt>C.I.:</dt>
    <dd>{{ $representantes->ci }}</dd>
    <dt>Cargo:</dt>
    <dd>{{ $representantes->cargo }}</dd>
  </dl>
  <small><strong>Creado el 
    <cite title="Source Title">
      {{ date("d/m/Y H:i:s a", strtotime($representantes->created_at)) }}
    </cite>
     por 
    <cite>
      @foreach($users as $user)
              @if($user->id == $representantes->id_user)
                  {{ $user->username }}
              @endif
          @endforeach
    </cite>
    </strong>
  </small>
  <small><strong>Ultima actualización el 
    <cite title="Source Title">
      {{ date("d/m/Y H:i:s a", strtotime($representantes->updated_at)) }}
    </cite>
     por 
    <cite>
      @foreach($users as $user)
              @if($user->id == $representantes->update_user)
                  {{ $user->username }}
              @endif
          @endforeach
    </cite>
    </strong>
  </small>
  </blockquote>
     
@stop