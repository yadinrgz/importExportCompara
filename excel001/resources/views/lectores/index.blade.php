@extends('layouts.app')
@section('title', 'Horarios')
@section('content')
<div class="content-wrapper">
<div class="container card mt-5">
<div class="card-body">
    <div class="row align-items-center g-3 mb-3">
        <div class="col-md-6">
            <h4 class="mb-0">Lectores</h4>
        </div>
    <!--     <div class="col-md-6 text-md-end">
            <a class="btn btn-success me-2" href="{{route('importHorariosIndex')}}">
                Importar</a>
        </div> -->
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">clave</th>
                    <th scope="col">Lector</th>
                    <th scope="col">Nombre Lector</th>
                    <th scope="col">Host</th>
                    <th scope="col">IP</th>
                    <th scope="col">Terminal</th>
                    <th scope="col">Puerto</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lectores as $prot)
                <tr>
                    <td>{{$prot->clave}}</td>
                    <td>{{$prot->lector}}</td>
                    <td>{{$prot->nombre_lector}}</td>
                    <td>{{$prot->host}}</td>
                    <td>{{$prot->ip}}</td>
                    <td>{{$prot->terminal}}</td>
                    <td>{{$prot->puerto}}</td>
  </tr>
                @endforeach
            </tbody>
        </table>
        @if($lectores instanceof \Illuminate\Pagination\LengthAwarePaginator)
        <div class="mt-4">
            {!! $lectores->links() !!}
        </div>
        @endif
    </div>
</div>
</div>
</div>

@endsection