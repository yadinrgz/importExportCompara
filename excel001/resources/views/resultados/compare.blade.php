@extends('layouts.app')

@section('content')
<h1>Productos sin Ingresos</h1> 


<div>
    
<p>Total de registros comparados: {{ $totalRegistrosComparados }}</p>
<p>Total de registros diferentes: {{ $totalRegistrosDiferentes }}</p>
<p>Porcentaje de registros diferentes: {{ $porcentajeRegistrosDiferentes }}%</p>
<a class="btn btn-secondary me-2" href="{{route('exportProduct')}}">
                Export
            </a>

</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>EmpNumber</th>
            <th>Nombre</th>
            <th>Puesto</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productosConDiferencias as $producto)
            <tr>
                <td>{{ $producto->empnumber }}</td>
                <td>{{ $producto->name }}</td>
                <td>{{ $producto->puesto }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
