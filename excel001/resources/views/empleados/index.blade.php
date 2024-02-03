@extends('layouts.app')
@section('title', 'Empleados')
@section('content')


<!-- INDEX EMPLEADOS -->
<!-- INDEX EMPLEADOS -->
<!-- INDEX EMPLEADOS -->


<div class="container mt-5">
    <div class="row align-items-center g-3 mb-3">
        <div class="col-md-6">
            <h4 class="mb-0">Empleados XLSX</h4>
        </div>
      <div class="col-md-6 text-md-end">
      <a class="btn btn-primary btn-lg" href="/comparancia">
                Siguiente
            </a>
       
        </div> 
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>

                
                    <th scope="col">Número de empleado</th>
                    <th scope="col">Nombre completo</th>
                    <th scope="col">Agregado el</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empleados as $empleado)
                <tr>

                    <td>{{$empleado->empnumber_ingsio}}</td>
                    <td>{{$empleado->name_ingsio}}</td>
 
                    <td>{{$empleado->updated_at->format('M d, Y')}}</td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
        @if($empleados instanceof \Illuminate\Pagination\LengthAwarePaginator)
        <div class="mt-4">
            {!! $empleados->links() !!}
        </div>
        @endif
    </div>
</div>

@endsection