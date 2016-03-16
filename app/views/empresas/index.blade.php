@extends('master.layout')

@section('content')
    
    <legend><h3>{{ $empresa->nombre }}</h3></legend>
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('home') }}">Inicio</a></li>
        <li class="active">
            @if($totalEmpresa == 0)
                
            @else
                {{ $empresa->nombre }}
            @endif
        </li>
    </ol>
    
    @if($totalEmpresa == 0)
	   <h3><a href="{{ route('empresas.create') }}" class="btn btn-success">Agregar Empresa</a></h3>
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