@extends('master.layout')

@section('content')

    <legend><h3>Nóminas</h3></legend>
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('home') }}">Inicio</a></li>
        <li class="active">Nóminas</li>
    </ol>
    <h3><a href="{{ route('nominas.create') }}" class="btn btn-success">Crear Nómina</a></h3>
    <table class="table table-striped table-hover table-responsive">
        <tr>
            <th>#</th>
            <th>Desde</th>
            <th>Hasta</th>
            <th>Empresa</th> 
            <th>Representante</th>   
            <th>Fecha Publicación</th>   
            <th>Acciones</th>
        </tr>
        <?php $cont = 0;?>
        @foreach ($nominas as $nomina)
            <tr>
                <td>{{ $cont += 1 }}</td>
                <td>{{ date("d/m/Y", strtotime($nomina->desde)) }}</td>
                <td>{{ date("d/m/Y", strtotime($nomina->hasta)) }}</td>
                <td>{{ $empresa->nombre }}</td>
                <td>
                    @foreach($representantes as $representante)
                        @if($representante->id == $nomina->id_representante)
                            {{ $representante->nombre }}
                        @endif
                    @endforeach
                </td>
                <td>{{ date("d/m/Y", strtotime($nomina->fecha_public)) }}</td>
                <td>
                    <a href="{{ route('nominas.show', $nomina->id) }}" class="btn btn-info btn-xs">Ver </a>
                    <a href="{{ route('nominas.edit', $nomina->id) }}" class="btn btn-warning btn-xs"> Editar</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $nominas->links() }}
@stop