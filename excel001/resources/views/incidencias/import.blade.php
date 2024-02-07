@extends('layouts.app')
@section('title', 'Import Incidencias')
@section('content')

<div class="content-wrapper">
<div class="container card mt-5">
<div class="card-body">
<h3>Reporte de Incidencias</h3>
      <p>Este proceso compara las incidencias de los colaboradores según el checador de INGRESSIO </p>
      <h4>Instrucciones</h4>

      <p>
      <ol>
        <li>Haga clic en el botón "Seleccionar archivo"</li>

        <li> Seleccione el documento <strong>"KARDEX.XLSX"</strong> obtenido de <strong>INGRESSIO</strong></li>
        <li>Haga clic en importar</li>
        <li>Espere a que se muestren los resultados en la tabla</li>
        <li>Haga clic en siguiente</li>
      </ol>
      </p>

    <form class="row g-3" action="{{route('importIncidencias')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-4">
            <label class="form-label" for="fileInp">KARDEX.XLSX</label>
            <input class="form-control" id="fileInp" type="file" name="file">
            @error('file')<small class="text-danger">{{$message}}</small>@enderror
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Importar</button>
        </div>
    </form>
</div>
</div>
</div>

@endsection