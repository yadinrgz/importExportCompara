@extends('layouts.app')
@section('title', 'Enrolamiento')
@section('content')

<div class="container mt-5">
    <div class="row align-items-center g-3 mb-3">
        <div class="col-md-6">
            <h4 class="mb-0">ENROLAMIENTOS</h4>
        </div>
        <div class="col-md-6 text-md-end">
            <a class="btn btn-success me-2" href="{{route('importEnrolamientoIndex')}}">
                Import</a>
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
                @foreach($enrolamientos as $enrolamiento)
                <tr>
                    <td>{{$enrolamiento->numbemp_bio}}</td>
                    <td>{{$enrolamiento->name_bio}}</td>
                    <td>{{$enrolamiento->rostro_bio}}</td>
                  
                </tr>
                @endforeach
            </tbody>
        </table>
        @if($enrolamientos instanceof \Illuminate\Pagination\LengthAwarePaginator)
        <div class="mt-4">
            {!! $enrolamientos->links() !!}
        </div>
        @endif
    </div>
</div>

@endsection