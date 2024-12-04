<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Habitaciones</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <div class="container mt-5">
        <button class="btn btn-secondary" onclick="window.location.href='{{ route('index_habitacion') }}'">Volver</button>
        <h2 class="text-center mb-4">Listado de Habitaciones</h2>

        @if(session('error'))
        <div class="alert alert-danger">
        {{ session('error') }}
        </div>
        @endif

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Número de Habitación</th>
                    <th>Estado</th>
                    <th>Número de Camas</th>
                    <th>Piso</th>
                    <th>Jacuzzi</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($habitaciones  as $data)
                <tr>
                    <td>{{$data->N_habitacion}}</td>
                    <td>{{$data->Estado}}</td>
                    <td>{{$data->N_Camas}}</td>
                    <td>{{$data->Piso}}</td>
                    <td>{{$data->Jacuzzi}}</td>
                    <td class="text-center">
                        <form action="{{ route('eliminar_habitacion', $data->N_habitacion) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" id="butonDelete" onclick="return warning()">Eliminar</button>
                        </form>
                        {{-- <button class="btn btn-danger btn-sm" onclick="window.location.href='{{ route('eliminar_habitacion', ['id' => $data->N_habitacion]) }}) }}'">Eliminar</button>  --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>    
    <script>
        function warning(){
      let respuesta = confirm("¿Deseas realmente borrar este registro?\nRecuerda que se eliminarán todas las prendas entregadas");
        if(respuesta==true){
          return true;
        }else{
          return false;
        }
    }
    </script>
</body>
</html>
</x-app-layout>