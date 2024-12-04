<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de Registros</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @if (session('success'))
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container mt-5">
        <button class="btn btn-secondary" onclick="window.location.href='{{ route('dashboard') }}'">Volver</button>
        <h1 class="text-center mb-4">Información de Registros</h1>

        <!-- Filtros -->
        
        <form action="{{ route('filter_data') }}" method="POST">
            @csrf
            <div class="row mb-6">
                <div class="col-md-3">
                    <label for="filter-room" class="form-label">Numero de habitacion</label>
                    <input type="number" class="form-control" id="filter-room" placeholder="Filter by Room" name="n_habitaicon">
                </div>
        
                <div class="col-md-3">
                    <label for="start-date" class="form-label">Fecha Inicio</label>
                    <input type="date" class="form-control" id="start_date" name="fecha_inicio2">
                </div>
        
                <div class="col-md-3">
                    <label for="end-date" class="form-label">Fecha Final</label>
                    <input type="date" class="form-control" id="end_date" name="fecha_final2">
                </div>
                
            </div>
            <div class="text-center">
                <button class="btn btn-info" type="submit" name='filterData' value="FILTRAR">Filter</button>
            </div>
        
            <button type="submit" class="btn btn-success mb-2" name="filterData" value="EXCEL" onclick="return filterExcel()">Descargar Excel</button>
        </form>
               
        <table class="table table-striped">
            <br>
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
                    <th>Acciones</th>
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
                    <td>{{ $data->Hor_ingreso}}</td>
                    <td>{{ $data->Hor_salida}}</td>
                    <td>{{ $data->Observacion}}</td>
                    <td>{{ number_format($data->Valor, 0 ,',') }}</td>
                    <td>
                        <form action="{{ route('eliminar_registro', $data->id_habitacion_uso) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" id="butonDelete" onclick="return warning()">Eliminar</button>
                            </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        function fechas(){
            let fechaInicio = document.getElementById('fecha_inicio');
            let fecha_final = document.getElementById('fecha_final');

            const fechaIni = fechaInicio.split("-").reverse().join("-");
            const fechaFin = final.split("-").reverse().join("-");

             document.getElementById('date1').value = fechaIni;
             document.getElementById('date2').value = fechaFin;
        }

        function warning(){
        let respuesta = confirm("¿Deseas realmente borrar este registro?\nRecuerda que se eliminarán todas las prendas entregadas");
            if(respuesta==true){
            return true;
            }else{
            return false;
            }
        }

        function filterExcel(){
        let result = confirm("¿Estas seguro de descargar el excel con estos filtros?\nEsto puede tardar unos minutos");
        if(result == true ){
        return true;
        }else{
        return false;  
            }
        }
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
</x-app-layout>