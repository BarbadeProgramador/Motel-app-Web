<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Visita</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-center">Registrar Visita</h1>
            <button class="btn btn-secondary" onclick="window.location.href='{{ route('dashboard') }}'">Volver</button>
        </div>

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <form method="POST" action="{{ route('visita_registrar') }}">
            @CSRF
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="id_habitacion" class="form-label">Numero de habitacion</label>
                    
                    <select name="numero_habitacion" id="numero_habitacion" class="form-control">
                    @foreach($habitaciones as $habitacion)
                    <option value="{{ $habitacion->N_habitacion }}">{{ $habitacion->N_habitacion }}</option>
                    @endforeach
                    </select>
                    {{-- <input type="text" class="form-control" id="id_habitacion" name="id_habitacion" placeholder="Ingrese el ID de la habitación" required> --}}
                </div>
                <div class="col-md-6">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" required>
                </div>
            </div>

            <!-- Segunda fila: Cédula y Nombre -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="hora" class="form-label">Hora de ingreso</label>
                    <input type="time" class="form-control" id="hora" name="hora" required>
                </div>

                <div class="col-md-4">
                    <label for="cedula" class="form-label">Cédula</label>
                    <input type="number" class="form-control" id="cedula" name="cedula" placeholder="Ingrese la cédula del cliente" required>
                </div>
                <div class="col-md-4">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre del cliente" required>
                </div>
            </div>

            
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="n_personas" class="form-label">Número de Personas</label>
                    <input type="number" class="form-control" id="n_personas" name="n_personas" placeholder="Ingrese el número de personas" required>0
                </div>
                <div class="col-md-4">
                    <label for="tiempo" class="form-label">Tiempo</label>
                    <input type="number" class="form-control" id="tiempo" name="tiempo" placeholder="Ingrese el tiempo de estadía" required>
                </div>
                <div class="col-md-4">
                    <label for="valor" class="form-label">Valor ($)</label>
                    <input type="number" step="0.01" class="form-control" id="valor" name="valor" placeholder="Ingrese el valor total" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Registrar Habitación</button>
        </form>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
</x-app-layout>