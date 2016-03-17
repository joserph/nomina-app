@extends ('master.layout')
@section ('content')

  <ol class="breadcrumb">
    <legend><h3><i class="fa fa-book fa-fw"></i> {{ $conceptos->descripcion }}</h3></legend>

    <ol class="breadcrumb">
      <li><a href="{{ URL::route('home') }}">Inicio</a></li>
      <li><a href="{{ route('conceptos.index') }}">Conceptos</a></li>
      <li class="active">{{ $conceptos->descripcion }}</li>
    </ol>
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
  </ol>
     
@stop