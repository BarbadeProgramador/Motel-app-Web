<x-app-layout>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Habitaciones</title>
    <!-- Vincula con el archivo CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <h2 class="text-center">Formulario de Habitaciones</h2>
        <button class="btn btn-secondary" onclick="window.location.href='{{ route('dashboard') }}'">Volver</button>


        <button class="btn btn-danger" onclick="window.location.href='{{ route('index_all') }}'">Lista de habitaciones</button>
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

        <form action="{{route('registrar_habitacion')}}" method="POST">
            @CSRF
            <div class="row mb-3">
                <!-- Número de Habitación y Piso en la misma fila -->
                <div class="col-md-6">
                    <label for="n_habitacion" class="form-label">Número de Habitación</label>
                    <input type="number" class="form-control" id="n_habitacion" name="n_habitacion" required>
                </div>
                <div class="col-md-6">
                    <label for="piso" class="form-label">Piso</label>
                    <select class="form-select" id="piso" name="piso" required>
                        <option value="" selected disabled>Seleccionar Piso</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
            </div>

            <!-- Número de Camas y Jacuzzi en la misma línea -->
            <div class="row mb-3 d-flex justify-content-center">
                <div class="col-md-6">
                    <label for="n_camas" class="form-label">Número de Camas</label>
                    <select class="form-select" id="n_camas" name="n_camas" required>
                        <option value="" selected disabled>Seleccionar Número de Camas</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Jacuzzi</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jacuzzi" id="jacuzzi_si" value="Sí" required>
                        <label class="form-check-label" for="jacuzzi_si">
                            Sí
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jacuzzi" id="jacuzzi_no" value="No">
                        <label class="form-check-label" for="jacuzzi_no">
                            No
                        </label>
                    </div>
                </div>
            </div>

            <!-- Botón centrado -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>

    <!-- Vincula con el archivo JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
</x-app-layout>