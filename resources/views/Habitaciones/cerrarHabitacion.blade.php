<x-app-layout>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <!-- Vincula Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <button class="btn btn-secondary" onclick="window.location.href='{{ route('dashboard') }}'">Volver</button>
    <br>
    <br>
    <h2>Cerrar Servicio</h2>
    <form action="{{route('index_actualizar', ['id' => $id])}}" method="POST">
        @csrf
        @method('PUT')
        <!-- Campo: Hora de salida -->
        <div class="mb-3">
            <label for="hora_salida" class="form-label">Hora de Salida</label>
            <input type="time" class="form-control" id="hora_salida" name="hora_salida" required>
        </div>

        <!-- Campo: Observaciones -->
        <div class="mb-3">
            <label for="observaciones" class="form-label">Observaciones</label>
            <textarea class="form-control" id="observaciones" name="observaciones" rows="3" ></textarea>
        </div>

        
        <button type="submit" class="btn btn-danger">Confirmar</button>
    </form>
</div>

<!-- Vincula Bootstrap JS y Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>

</x-app-layout>