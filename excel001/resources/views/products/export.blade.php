<table>
    <thead>
        <tr>
            <th>Número de empleado</th>
            <th>Nombre Completo</th>
            <th>Grupo</th>
            <th>Puesto</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$product->empnumber}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->grupo}}</td>
            <td>{{$product->puesto}}</td>
        </tr>
        @endforeach
    </tbody>
</table>