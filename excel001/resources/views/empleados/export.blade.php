<table>
    <thead>
        <tr>
            <th>Número de empleado</th>
            <th>Nombre Completo</th>
           
        </tr>
    </thead>
    <tbody>
        @foreach($empleados as $empleado)
        <tr>
            <td>{{$empleado->empnumber_ingsio}}</td>
            <td>{{$empleado->name_ingsio}}</td>
         
        </tr>
        @endforeach
    </tbody>
</table>