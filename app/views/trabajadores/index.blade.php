@extends('master.layout')

@section('content')
    
    <legend><h3>Trabajadores</h3></legend>
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('home') }}">Inicio</a></li>
        <li class="active">Trabajadores</li>
    </ol>
    <h3><a href="{{ route('trabajadores.create') }}" class="btn btn-success">Agregar Trabajador</a></h3>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab" aria-expanded="true">Trabajadores Activos</a></li>
        <li class=""><a href="#profile" data-toggle="tab" aria-expanded="false">Trabajadores Retirados</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="home">
            <table class="table table-striped table-hover table-responsive">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellido</th>  
                    <th>C.I.</th>
                    <th>Edad</th>
                    <th>Fecha Ingreso</th>
                    <th>Cargo</th>  
                    <th>T. Alimen.</th>
                    <th>Sueldo</th>
                    <th>Acciones</th>
                </tr>
                <?php $cont = 0;?>
                @foreach ($trabajadores as $trabajador)
                    <?php
                        $anioNacimiento = date("Y", strtotime($trabajador->fecha_n));
                        $anioActual = date("Y");
                        $edad = $anioActual - $anioNacimiento;
                    ?>
                    @if($trabajador->estatus == 'activo')
                        <tr>
                            <td>{{ $cont += 1 }}</td>
                            <td class="text-uppercase">{{ $trabajador->nombre }}</td>
                            <td class="text-uppercase">{{ $trabajador->apellido }}</td>
                            <td>{{ number_format($trabajador->ci,0,",",".") }}</td>
                            <td>{{ $edad }}</td>
                            <td>{{ date("d/m/Y", strtotime($trabajador->fecha_i)) }}</td>
                            <td>{{ $trabajador->cargo }}</td>
                            <td>{{ number_format($trabajador->ct,2,",",".") }}</td>
                            <td>{{ number_format($trabajador->sueldo,2,",",".") }}</td>
                            <td>
                                <a href="{{ route('trabajadores.show', $trabajador->id) }}" class="btn btn-info btn-xs">Ver </a>
                                <a href="{{ route('trabajadores.edit', $trabajador->id) }}" class="btn btn-warning btn-xs"> Editar</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
            {{ $trabajadores->links() }}
        </div>
        <div class="tab-pane fade" id="profile">
            <table class="table table-striped table-hover table-responsive">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellido</th>  
                    <th>C.I.</th>
                    <th>Edad</th>
                    <th>Fecha Ingreso</th>
                    <th>Cargo</th>  
                    <th>Sueldo</th>
                    <th>Acciones</th>
                </tr>
                <?php $cont = 0;?>
                @foreach ($trabajadores as $trabajador)
                    <?php
                        $anioNacimiento = date("Y", strtotime($trabajador->fecha_n));
                        $anioActual = date("Y");
                        $edad = $anioActual - $anioNacimiento;
                    ?>
                    @if($trabajador->estatus == 'retirado')
                        <tr>
                            <td>{{ $cont += 1 }}</td>
                            <td class="text-uppercase">{{ $trabajador->nombre }}</td>
                            <td class="text-uppercase">{{ $trabajador->apellido }}</td>
                            <td>{{ number_format($trabajador->ci,0,",",".") }}</td>
                            <td>{{ $edad }}</td>
                            <td>{{ date("d/m/Y", strtotime($trabajador->fecha_i)) }}</td>
                            <td>{{ $trabajador->cargo }}</td>
                            <td>{{ number_format($trabajador->sueldo,2,",",".") }}</td>
                            <td>
                                <a href="{{ route('trabajadores.show', $trabajador->id) }}" class="btn btn-info btn-xs">Ver </a>
                                <a href="{{ route('trabajadores.edit', $trabajador->id) }}" class="btn btn-warning btn-xs"> Editar</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
            {{ $trabajadores->links() }}
        </div>
    </div>
@stop