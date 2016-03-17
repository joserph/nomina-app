@extends('master.layout')

@section('content')
        
    <legend><h3>Recibos Otros</h3></legend>
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('home') }}">Inicio</a></li>
        <li class="active">Recibos Otros</li>
    </ol>
    <h3><a href="{{ route('recibosotros.create') }}" class="btn btn-success">Crear Recibo</a></h3>
    <table class="table table-striped table-hover table-responsive">
        <tr>
            <th>#</th>
            <th>Desde</th>
            <th>Hasta</th>
            <th>Dias Laborables</th>  
            <th>Fecha</th>            
            <th>Acciones</th>
        </tr>
        <?php $cont = 0;?>
        @foreach ($recibos as $recibo)
            <tr>
                <td>{{ $cont += 1 }}</td>
                <td>{{ $recibo->desde }}</td>
                <td>{{ $recibo->hasta }}</td>
                <td>{{ $recibo->dias_lab }}</td>
                <td>{{ $recibo->fecha }}</td>
                <td>
                    <a href="{{ route('recibosotros.show', $recibo->id) }}" class="btn btn-info btn-xs">Ver </a>
                    <a href="{{ route('recibosotros.edit', $recibo->id) }}" class="btn btn-warning btn-xs"> Editar</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $recibos->links() }}
@stop