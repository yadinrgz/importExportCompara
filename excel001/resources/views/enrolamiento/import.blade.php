@extends('layouts.app')
@section('title', 'Import Enrolamiento')
@section('content')

<div class="container mt-5">
<h3>% de Enrolamiento</h3>
      <p>Este proceso compara los colaboradores dados de alta en el sistema para comprobar si ya han sido registrados en el checador biométrico </p>
      <h4>Instrucciones</h4>

      <p>
      <ol>
        <li>Haga clic en el botón "Seleccionar archivo"</li>

        <li> Seleccione el documento <strong>"B.XLSX"</strong> obtenido de <strong>ESLABON</strong></li>
        <li>Haga clic en importar</li>
        <li>Espere a que se muestren los resultados en la tabla</li>
        <li>Haga clic en siguiente</li>
      </ol>
      </p>

    <form class="row g-3" action="{{route('importEnrolamiento')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-4">
            <label class="form-label" for="fileInp">File</label>
            <input class="form-control" id="fileInp" type="file" name="file">
            @error('file')<small class="text-danger">{{$message}}</small>@enderror
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Import</button>
        </div>
    </form>
</div>

@endsection