<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Número de Habitación</th>
            <th>Nombre</th>
            <th>Cédula</th>
            <th>Fecha</th>
            <th>Tiempo</th>
            <th>Hora Entrada</th>
            <th>Hora Salida</th>
            <th>Observaciones</th>
            <th>Valor</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($habitaciones as $data)
        <tr>
            <td>{{ $data->id_habitacion_uso }}</td>
            <td>{{ $data->id_habitacion }}</td>
            <td>{{ $data->Nombre }}</td>
            <td>{{ $data->Cedula }}</td>
            <td>{{ $data->fecha }}</td>
            <td>{{ $data->Tiempo }} Horas</td>
            <td>{{ $data->Hor_ingreso }}</td>
            <td>{{ $data->Hor_salida }}</td>
            <td>{{ $data->Observacion }}</td>
            <td>{{ number_format($data->Valor, 0, ',', '.') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
