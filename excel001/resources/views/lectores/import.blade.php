@extends('layouts.app')
@section('title', 'Import Prot')
@section('content')

<div class="content-wrapper">
<div class="container card mt-5">
<div class="card-body">
<h3>Lectores</h3>
     

    <form class="row g-3" action="{{route('importProt')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-4">
            <label class="form-label" for="fileInp">Lectores.xlsx</label>
            <input class="form-control" id="fileInp" type="file" name="file">
            @error('file')<small class="text-danger">{{$message}}</small>@enderror
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">importar</button>
        </div>
    </form>
</div>
</div>
</div>

@endsection