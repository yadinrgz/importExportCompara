@extends('layouts.app')
@section('title', 'Products')
@section('content')


<!-- INDEX PRODUCTOS -->
<!-- INDEX PRODUCTOS -->
<!-- INDEX PRODUCTOS -->

<div class="container mt-5">
    <div class="row align-items-center g-3 mb-3">
        <div class="col-md-6">
            <h4 class="mb-0">Empleados</h4>
        </div>
        <div class="col-md-6 text-md-end">
            <a class="btn btn-primary btn-lg" href="{{route('importProductIndex')}}">
                Siguiente
            </a>
         <a class="btn btn-secondary me-2" href="{{route('exportProduct')}}">
                Export
            </a>
            <a class="btn btn-primary" href="{{route('products.create')}}">
                Create
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">Número de empleado</th>
                    <th scope="col">Nombre completo</th>
                    <th scope="col">Grupo</th>
                    <th scope="col">Puesto</th>
                    <th scope="col">Agregado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{$product->empnumber}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->grupo}}</td>
                    <td>{{$product->puesto}}</td>
                    <td>{{$product->updated_at->format('M d, Y')}}</td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
        @if($products instanceof \Illuminate\Pagination\LengthAwarePaginator)
        <div class="mt-4">
            {!! $products->links() !!}
        </div>
        @endif
    </div>
</div>

@endsection