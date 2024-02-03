@extends('layouts.app')

@section('content')
<div class="container">

<h3>Comparación de tablas no concordantes</h3> 


<div>
<!--     
<p>Total de registros comparados: {{ $totalRegistrosComparados }}</p>
<p>Total de registros diferentes: {{ $totalRegistrosDiferentes }}</p>
<p>Porcentaje de registros diferentes: {{ $porcentajeRegistrosDiferentes }}%</p>

 -->
 <div class="row">
  <div class="col-md-3">
    <div class="card text-white bg-primary mb-3">
      <div class="card-header">Total de registros comparados</div>
      <div class="card-body">
        <h1 class="card-title">{{ $totalRegistrosComparados }}</h1>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card text-white bg-warning mb-3">
      <div class="card-header">Total de registros diferentes</div>
      <div class="card-body">
        <h1 class="card-title">{{ $totalRegistrosDiferentes }}</h1>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card text-white bg-danger mb-3">
      <div class="card-header">Porcentaje de registros diferentes</div>
      <div class="card-body">
        <h1 class="card-title">{{ $porcentajeRegistrosDiferentes }}%</h1>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card text-white bg-light mb-3">
      <div class="card-body">
      <?php
    // Botón para exportar a XLSX
    
    echo '<div class="col-12 m-2"><button class="btn btn-primary btn-lg" onclick="exportToXlsx()">Exportar a XLSX</button></div>';
    echo '<div class="col-12 m-2"><button class="btn btn-success btn-lg" onclick="exportar()">Exportar a PDF</button></div>';

    ?>
      </div>
    </div>
  </div>
</div>

</div>

<div class="container mt-3">

</div>

<table class="table table-striped" id="my-table">
    <thead>
        <tr>
            <th>Número de empleado</th>
            <th>Nombre</th>
            <th>Puesto</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productosConDiferencias as $producto)
            <tr>
                <td>{{ $producto->empnumber }}</td>
                <td>{{ $producto->name }}</td>
                <td>{{ $producto->puesto }}</td>
            </tr>
        @endforeach
    </tbody>
</table>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



<script>
function exportTableToExcel(tableId, filename) {
    const table = document.getElementById(tableId);
    const ws = XLSX.utils.table_to_book(table, { sheet: "Sheet1" });
    const wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, "Sheet1");
    XLSX.writeFile(wb, filename + ".xlsx");
}
</script>

<script>
    function exportToXlsx() {
        // Crear un nuevo libro de trabajo y una hoja de cálculo
        var wb = XLSX.utils.book_new();
        var ws = XLSX.utils.table_to_sheet(document.querySelector('table'));

        // Añadir la hoja de cálculo al libro de trabajo
        XLSX.utils.book_append_sheet(wb, ws, 'Registros Diferentes');

        // Guardar el libro de trabajo como un archivo XLSX
        XLSX.writeFile(wb, 'registros_diferentes.xlsx');
    }

    function exportar() {
        // Configurar opciones de PDF
        var options = {
            margin: 10,
            filename: 'registros_diferentes.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }

            
        };

        // Obtener el contenedor de la tabla
        var element = document.querySelector('table');

        // Convertir a PDF
        html2pdf(element, options);
    } 




</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.3/xlsx.full.min.js"></script>
</div>
@endsection
