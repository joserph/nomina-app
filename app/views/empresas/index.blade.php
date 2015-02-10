@extends('master.layout')

@section('content')
    @if($totalEmpresa == 0)
	   <h1><a href="{{ route('empresas.create') }}" class="btn btn-success">Agregar Empresa</a></h1>
    @else
        <div class="row">
            <h1 class="text-center">{{ $empresa->nombre }}</h1>
            <h3 class="text-center">{{ $empresa->rif }}</h3>
            <h3 class="text-center"><i class="fa fa-phone"></i> {{ $empresa->tlf }}</h3>
            <h3 class="text-center"><i class="fa fa-map-marker"></i> {{ $empresa->direccion }}</h3> 
            <h1 class="text-center"><a href="{{ route('empresas.edit', $empresa->id) }}" class="btn btn-warning">Editar</a></h1>
        </div>

    @endif
@stop