<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comparar tablas</title>
</head>
<body>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>empnumber_ingreso</th>
                <th>empnumber_producto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($diferencias as $diferencia)
                <tr>
                    <td>{{ $diferencia->empnumber_ingreso }}</td>
                    <td>{{ $diferencia->empnumber_producto }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
