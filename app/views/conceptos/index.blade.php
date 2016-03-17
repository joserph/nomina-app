@extends('master.layout')

@section('content')
    

    <legend><h2>Conceptos</h2></legend>

    <legend><h3><i class="fa fa-book fa-fw"></i> Conceptos</h3></legend>

    <ol class="breadcrumb">
        <li><a href="{{ URL::route('home') }}">Inicio</a></li>
        <li class="active">Conceptos</li>
    </ol>

    <table class="table table-striped table-hover table-responsive">
        <tr>
            <th>#</th>
            <th>Código</th>
            <th>Descripción</th>
            <th>Porcentaje</th>           
            <th>Acciones</th>
        </tr>
        <?php $cont = 0;?>
        @foreach ($conceptos as $concepto)
            <tr>
                <td>{{ $cont += 1 }}</td>
                <td>{{ $concepto->codigo }}</td>
                <td>{{ $concepto->descripcion }}</td>
                <td>{{ $concepto->porcentaje }}</td>
                <td>
                    <a href="{{ route('conceptos.show', $concepto->id) }}" class="btn btn-info btn-xs">Ver </a>
                    <a href="{{ route('conceptos.edit', $concepto->id) }}" class="btn btn-warning btn-xs"> Editar</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $conceptos->links() }}
@stop