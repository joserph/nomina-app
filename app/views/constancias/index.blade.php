@extends('master.layout')

@section('content')
        
    <legend><h3>Constancias</h3></legend>
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('home') }}">Inicio</a></li>
        <li class="active">Constancias</li>
    </ol>
    <h3><a href="{{ route('constancias.create') }}" class="btn btn-success">Crear Constancia</a></h3>
    <table class="table table-striped table-hover table-responsive">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>C.I.</th>
            <th>Fecha de Ingreso</th> 
            <th>Cargo</th>
            <th>Sueldo</th>
            <th>Fecha de Constancia</th>       
            <th>Acciones</th>
        </tr>
        <?php $cont = 0;?>
        @foreach ($constancias as $constancia)
            <tr>
                <td>{{ $cont += 1 }}</td>
                <td>{{ $constancia->nombre }}</td>
                <td>{{ $constancia->ci }}</td>
                <td>{{ $constancia->fecha_ingreso }}</td>
                <td>{{ $constancia->cargo }}</td>
                <td>{{ $constancia->sueldo }}</td>
                <td>{{ $constancia->fecha }}</td>
                <td>
                    <a href="{{ route('constancias.show', $constancia->id) }}" class="btn btn-info btn-xs">Ver </a>
                    <a href="{{ route('constancias.edit', $constancia->id) }}" class="btn btn-warning btn-xs"> Editar</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $constancias->links() }}
@stop