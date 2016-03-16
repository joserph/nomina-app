@extends('master.layout')

@section('content')
        
    <legend><h3>Representantes</h3></legend>
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('home') }}">Inicio</a></li>
        <li class="active">Representantes</li>
    </ol>
    <h3><a href="{{ route('representantes.create') }}" class="btn btn-success">Crear representante</a></h3>
    <table class="table table-striped table-hover table-responsive">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>C.I.</th>
            <th>Cargo</th>           
            <th>Acciones</th>
        </tr>
        <?php $cont = 0;?>
        @foreach ($representantes as $representante)
            <tr>
                <td>{{ $cont += 1 }}</td>
                <td>{{ $representante->nombre }}</td>
                <td>{{ $representante->ci }}</td>
                <td>{{ $representante->cargo }}</td>
                <td>
                    <a href="{{ route('representantes.show', $representante->id) }}" class="btn btn-info btn-xs">Ver </a>
                    <a href="{{ route('representantes.edit', $representante->id) }}" class="btn btn-warning btn-xs"> Editar</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $representantes->links() }}
@stop