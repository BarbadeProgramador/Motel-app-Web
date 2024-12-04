<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Habitaciones Disponibles</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
        <!-- Importar la fuente Dancing Script desde Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
        <style>
            body {
                background-color: #9c1111; /* Fondo rosado claro */
                color: #990000; /* Texto rojo oscuro */
            }

            h1 {
                font-family: 'Dancing Script', cursive; /* Aplicar la fuente Dancing Script */
                color: #de96c1; /* Color llamativo para el título */
                font-size: 50px; /* Tamaño más grande */
                font-style: italic; /* Cursiva en el título */
                font-weight: bold; /* Negrita para que sea más llamativo */
                text-align: center; /* Centrar el título */
            }

            .btn-danger {
                background-color: #990000; /* Rojo oscuro */
                border-color: #990000;
            }

            .btn-danger:hover {
                background-color: #800000; /* Rojo más oscuro */
                border-color: #800000;
            }

            .card-horizontal {
                display: flex;
                flex-direction: row;
                background-color: #ffe6e6; /* Fondo de tarjeta rosado claro */
                border: 1px solid #e6004c; /* Borde rojo fresa */
                border-radius: 8px;
            }

            .card-horizontal img {
                width: 45%; /* Mantener el tamaño */
                object-fit: cover;
                border-top-left-radius: 8px;
                border-bottom-left-radius: 8px;
            }

            .card-horizontal .card-body {
                flex: 1;
            }

            /* Centrando la imagen */
            .text-center img {
                display: block;
                margin-left: auto;
                margin-right: auto;
            }

        </style>
    </head>
    <body>
        <div class="container mt-4">
            
            <div class="text-center">
                <img src="/images/Rosamel.png" alt="Imagen" class="text-center">
            </div>
    
            <!-- Botones alineados: izquierda, centro, derecha -->
            <div class="d-flex justify-content-between mb-4">
                <button 
                    onclick="window.location.href='{{ route('index_registro') }}'"
                    class="btn btn-success btn-lg d-flex align-items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                    Agregar nuevo servicio
                </button>
    
                <button onclick="window.location.href='{{ route('index_habitacion') }}'"
                    class="btn btn-info btn-lg d-flex align-items-center gap-2 mx-auto">
                    <i class="bi bi-door-open"></i> <!-- Icono de puerta -->
                    Agregar Habitación
                </button>
    
                <button onclick="window.location.href='{{ route('index_informacion') }}'"
                    class="btn btn-danger btn-lg d-flex align-items-center gap-2">
                    <i class="bi bi-book"></i> <!-- Icono de libro -->
                    Registros
                </button>
            </div>
    
            <h1>Habitaciones <i class="bi bi-heart"></i></h1> <!-- Icono de corazón al final del título -->
    
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
    
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @php
                    //Array para no repetir informacion de las habitaciones utilizadas
                    $habitaciones_mostradas = [];
                @endphp
    
                @foreach ($habitaciones as $habitacion)
                    @if(!in_array($habitacion->N_habitacion, $habitaciones_mostradas))
                        @php
                            $habitaciones_mostradas[] = $habitacion->N_habitacion;
                        @endphp
                        <div class="col">
                            <div class="card card-horizontal mb-4 shadow-sm">
                                <!-- Información de la tarjeta -->
                                <div class="card-body">
                                    <h5 class="card-title">Habitación {{ $habitacion->N_habitacion }}</h5>
                                    <p class="card-text">
                                        <strong>Estado:</strong> {{ $habitacion->Estado }}<br>
                                        <strong>Número de camas:</strong> {{ $habitacion->N_Camas }}<br>
                                        <strong>Piso:</strong> {{ $habitacion->Piso }}<br>
                                        <strong>Jacuzzi:</strong> {{ $habitacion->Jacuzzi}}<br>
                                    </p>
    
                                    @if($habitacion->Estado == 'Ocupado')
                                        <button class="btn btn-danger" onclick="window.location.href='{{ route('index_cerrar', ['id' => $habitacion->ID]) }}'"> Cerrar Reservación</button>
                                    @else
                                        <button class="btn btn-success"> Disponible </button>
                                    @endif
                                </div>
                    
                                <img 
                                    src="/images/Cama.png" 
                                    alt="Imagen de la Habitación" 
                                    class="card-img-right">
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
</x-app-layout>
