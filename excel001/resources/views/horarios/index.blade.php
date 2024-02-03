@extends('layouts.app')
@section('title', 'Horarios')
@section('content')

<div class="container mt-5">
    <div class="row align-items-center g-3 mb-3">
        <div class="col-md-6">
            <h4 class="mb-0">Horarios</h4>
        </div>
        <div class="col-md-6 text-md-end">
            <a class="btn btn-success me-2" href="{{route('importHorariosIndex')}}">
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
                @foreach($horarios as $horario)
                <tr>
                    <td>{{$horario->numbemp_hr}}</td>
                
                  
                </tr>
                @endforeach
            </tbody>
        </table>
        @if($horarios instanceof \Illuminate\Pagination\LengthAwarePaginator)
        <div class="mt-4">
            {!! $horarios->links() !!}
        </div>
        @endif
    </div>
</div>

@endsection