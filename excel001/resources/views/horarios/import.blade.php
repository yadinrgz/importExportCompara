@extends('layouts.app')
@section('title', 'Import Horarios')
@section('content')

<div class="content-wrapper">
<div class="container card mt-5">
<div class="card-body">
<h3>% Asignacion de Horarios</h3>
      <p>Este proceso compara los colaboradores dados de alta en el sistema que cuentan con horario asignado</p>
      <h4>Instrucciones</h4>

      <p>
      <ol>
        <li>Haga clic en el botón "Seleccionar archivo"</li>

        <li> Seleccione el documento <strong>"EMPLEADOS SIN ASIGNACION DE HORARIOS.XLSX"</strong> obtenido de <strong>INGRESSIO</strong></li>
        <li>Haga clic en importar</li>
        <li>Espere a que se muestren los resultados en la tabla</li>
        <li>Haga clic en siguiente</li>
      </ol>
      </p>

    <form class="row g-3" action="{{route('importHorarios')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-4">
            <label class="form-label" for="fileInp">EMPLEADOS SIN ASIGNACION DE HORARIOS.xlsx</label>
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