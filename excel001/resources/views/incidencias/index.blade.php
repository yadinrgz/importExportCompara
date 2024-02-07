@extends('layouts.app')
@section('title', 'Incidencias')
@section('content')
<div class="content-wrapper">
<div class="container card mt-5">
<div class="card-body">
    <div class="row align-items-center g-3 mb-3">
        <div class="col-md-6">
            <h4 class="mb-0">Incidencias</h4>
        </div>
        <div class="col-md-6 text-md-end">
            <a class="btn btn-success me-2" href="{{route('importIncidenciasIndex')}}">
                Importar</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">Número de empleado</th>
                    <th scope="col">Nombre completo</th>
                    <th scope="col">Rostro Ubio-XFace</th>
                </tr>
            </thead>
            <tbody>
                @foreach($incidencias as $incidencia)
                <tr>
                    <td>{{$incidencia->numemp_in}}</td>
                
                  
                </tr>
                @endforeach
            </tbody>
        </table>
        @if($incidencias instanceof \Illuminate\Pagination\LengthAwarePaginator)
        <div class="mt-4">
            {!! $incidencias->links() !!}
        </div>
        @endif
    </div>
</div>
</div>
</div>

@endsection